<?php
require __DIR__.'/../model/connectaBD.php';

function comprobar($mail)
{

    try {

            $conn = connectaBD();

            $sql = $conn->prepare("SELECT * FROM Usuario WHERE Correo = :mail");
            $sql->bindParam('mail', $mail);
            $sql->execute();
            $conn = null;

    } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();

    }

        return $sql;
}

function update ($nombre, $hash, $correo, $direccion, $pais, $cp)
{


    try {

         $conn=connectaBD();

        $filtropais = '/^[a-zA-Z\s]{0,30}$/';
        $filtrodireccion = '/^[a-zA-Z0-9\s]{0,30}$/';
        $filtrocp = '/^[0-9]{5}$/';
        $filtronombre = '/^[a-zA-Z\s]+$/';


        if (filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$filtronombre))) !== FALSE  &&
            filter_var($direccion, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$filtrodireccion))) !==FALSE &&
            filter_var($cp, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$filtrocp))) !==FALSE &&
            filter_var($pais, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$filtropais))) !==FALSE &&
            filter_var($correo, FILTER_VALIDATE_EMAIL) !==FALSE ) {

            $ID = $_SESSION['ID'];

            $datos = [

                'nombre' => $nombre,
                'hash' => $hash,
                'correo' => $correo,
                'direccion' => $direccion,
                'pais' => $pais,
                'cp' => $cp,
                'id' => $ID,
            ];

            $registro = "UPDATE Usuario SET
                                            Nombre = :nombre, 
                                            Contraseña = :hash,
                                            Correo = :correo,
                                            Dirección = :direccion,
                                            Población = :pais,
                                            Codigo_Postal = :cp
                                            
                         WHERE ID_Usuario = :id
                                            ";

            $sql = $conn->prepare($registro);
            $sql->execute($datos);


            $_SESSION['nombre'] = $nombre;
            $_SESSION['usuario'] = $correo;
            $_SESSION['direccion'] = $direccion;
            $_SESSION['poblacion'] = $pais;
            $_SESSION['postal'] = $cp;


            $conn = null;


        }

    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

function subirImagen($imagen){

    $conn = connectaBD();


    $sql = $conn->prepare("UPDATE Usuario SET Imagen = :imagen WHERE ID_Usuario = :id");
    $sql->bindParam('imagen', $imagen);
    $sql->bindParam('id', $_SESSION['ID']);
    $sql->execute();

    $_SESSION['Imagen'] = $imagen;

    $conn = null;
}




?>
