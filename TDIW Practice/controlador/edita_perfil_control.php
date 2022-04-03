<?php

require_once __DIR__.'/../model/edita_perfil_model.php';


	if(isset($_POST['passW']))
	{
		if (!empty($_POST['passW'])){

			$contra = $_POST['passW'];
			$correo = $_SESSION['usuario'];

			$comprobar = comprobar($correo);


			if ($comprobar->rowCount() == 1) {

				$correcto = $comprobar->fetch(PDO::FETCH_ASSOC);
				$hash = $correcto['Contraseña'];


				if (password_verify($contra,$hash)){

					if (empty($_POST['userName'])) {
						$nombre = $_SESSION['userName'];
					} else {
						$nombre = $_POST['userName'];
					}

					if (empty($_POST['mail'])) {
						$correo = $_SESSION['usuario'];
					} else {
						$correo = $_POST['mail'];
					}

					if (empty($_POST['direccion'])) {
						$direccion = $_SESSION['direccion'];
					} else {
						$direccion = $_POST['direccion'];
					}

					if (empty($_POST['country'])) {
						$pais = $_SESSION['poblacion'];
					} else {
						$pais = $_POST['country'];
					}

					if (empty($_POST['postalCode'])) {
						$cp = $_SESSION['postal'];
					} else {
						$cp = $_POST['postalCode'];
					}

					if (!empty($_POST['npassW']) ){
						$nuevacontra = password_hash($_POST['npassW'], PASSWORD_BCRYPT);
					}
					else{
						$nuevacontra = $hash;
					}

                    $pathAbsolute = '/home/TDIW/tdiwm-10/public_html/imagenesUser/';


					if ((isset($_FILES['foto']) && !empty($_FILES['foto']))) {


                            $nombreimagen = $_SESSION['ID'].$_FILES['foto']['name'];

                            $pathfinal = $pathAbsolute.$nombreimagen;

                            move_uploaded_file($_FILES['foto']['tmp_name'], $pathfinal);

                            subirImagen($nombreimagen);

					}


                    update($nombre, $nuevacontra, $correo, $direccion, $pais, $cp);

				}

			}
		}else {
			echo '<script type="text/javascript">alert(" Introduzca contraseña actual");</script>';
		}


	}

	include __DIR__.'/../views/edita_perfil_view.php';
?>
