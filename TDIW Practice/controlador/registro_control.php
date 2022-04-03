<?php

require_once __DIR__.'/../model/registro_model.php';	
 
	if (isset($_POST['userName'])){


		$nombre = $_POST['userName'];
		$password = $_POST['passW'];
		$correo = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$pais = $_POST['country'];
		$cp =  $_POST['postalCode'];

		$hash = password_hash($password, PASSWORD_BCRYPT);

		registro($nombre, $hash, $correo, $direccion, $pais, $cp);

		header("location:index.php");

	}else{
		include __DIR__.'/../views/registro_view.php';
	}
?>
