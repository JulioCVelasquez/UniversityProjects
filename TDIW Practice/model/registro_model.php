<?php
require __DIR__.'/../model/connectaBD.php';

function registro ($nombre, $hash, $correo, $direccion, $pais, $cp){


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

				$datos = [

					'nombre' => $nombre,
					'hash' => $hash,
					'correo' => $correo,
					'direccion' => $direccion,
					'pais' => $pais,
					'cp' => $cp,
				];

				$consulta_email = 'SELECT Correo FROM Usuario WHERE Correo =:correo';
				$comprobar = $conn->prepare($consulta_email);
				$comprobar->bindParam('correo', $correo);
				$comprobar->execute();
				$existe = $comprobar->fetchAll();

				if (empty($existe)) {

					$registro = "INSERT INTO Usuario (Nombre, Contraseña, Correo, Dirección, Población, Codigo_Postal) VALUES (:nombre, :hash, :correo, :direccion, :pais, :cp)";

					$sql = $conn->prepare($registro);
					$sql->execute($datos);

					$conn = null;

				}else{
					echo '<script type="text/javascript">alert("Introduzca un email no en uso");</script>';
				}

			}



	}catch (PDOException $e) {

        echo "Error: " . $e->getMessage();
    }

}

?>
