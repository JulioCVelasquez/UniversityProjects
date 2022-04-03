<?php
	require_once __DIR__.'/../model/login_model.php';
	if (isset($_POST['mail'])) {

        $password = $_POST['passW'];
        $correo = $_POST['mail'];

        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            $sql = comprobar($correo);

            if ($sql->rowCount() == 1) {

                $sql = $sql->fetch(PDO::FETCH_ASSOC);
                $hash = $sql['Contraseña'];


                if (password_verify($password, $hash))
                {
                    $_SESSION['ID'] = $sql['ID_Usuario'];
                    $_SESSION['nombre'] = $sql['Nombre'];
                    $_SESSION['usuario'] = $sql['Correo'];
                    $_SESSION['direccion'] = $sql['Dirección'];
                    $_SESSION['poblacion'] =  $sql['Población'];
                    $_SESSION['postal'] = $sql['Codigo_Postal'];
                    $_SESSION['Imagen'] = $sql['Imagen'];
                    $_SESSION['carrito']['total_items'] = 0;
                    $_SESSION['carrito']['total_import'] = 0;
                    $_SESSION['carrito']['productos'] = array();
                    header("location:index.php");
                }else{
                    echo '<script type="text/javascript">alert("¡Email o contraseña incorrectos, inténtelo de nuevo!");</script>';
                    include __DIR__.'/../views/login_view.php';
                }

            } else {
                echo '<script type="text/javascript">alert("Error base de datos");</script>';
                include __DIR__.'/../views/login_view.php';
            }
        }else{
                echo '<script type="text/javascript">alert("¡Email o contraseña incorrectos, inténtelo de nuevo!");</script>';
                include __DIR__.'/../views/login_view.php';
        }

    }else{
        include __DIR__.'/../views/login_view.php';
    }

?>
