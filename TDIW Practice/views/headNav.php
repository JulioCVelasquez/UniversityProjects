<head>
	<title>Dice Roll</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="/../views/estilos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="/../views/jquery.js"></script>
    <script type="text/javascript" src="/../views/funciones.js"></script>
</head>
<body>
	<div class="contenedor">
	<header>
		<a href="./index.php">
		<img id="logo" src="/../views/imagenesPrac/logo.png" alt="logo"></a>
		<div id="titulo">	
			<h1>DICE ROLL</h1>
			<h3>Tu lugar de diversión</h3>
	    </div>
	    <?php
	    //-----------------------SI HAY SESIÓN ACTIVA --> MOSTRAMOS RESUMEN CARRITO.
        if(isset($_SESSION['ID'])) { ?>
        		<div id="carrito">
        			<ul><h4><u>Resumen carrito:</u></h4></ul>
        			<ul>Número de productos: <?php echo $_SESSION['carrito']['total_items'];?></ul>
        			<ul>Precio Total: <?php echo $_SESSION['carrito']['total_import'];?>€</ul>
        		</div> 
        <?php } ?>
	</header>

	<nav>
		<a href="./index.php?accio=categories">Categorias</a>
		<div class="dropdown">
		<?php
            //-----------------------SI NO HAY SESIÓN ACTIVA --> MOSTRAMOS MENU Registo Y login
        if(!isset($_SESSION['ID'])) {
        ?>
       	<button onclick="menu_desplegable()" class="dropbtn">Entra</button>
        <div id="myDropdown" class="dropdown-content">
			<a href="./index.php?accio=registro">Registro</a>
			<a href="./index.php?accio=login">Login</a>
		</div>
		</div>
		<?php }
        //---------------------------SI ESTAMOS EN UNA SESIÓN YA ACTIVA--> MOSTRAMOS nombre user i cerrar sesion,etc...
        else { ?>
        <button onclick="menu_desplegable()" class="dropbtn">Menu usuario</button>
        <div id="myDropdown" class="dropdown-content">
        	<a href="./index.php?accio=edita_perfil">Mi cuenta</a>
			<a href="./index.php?accio=hist_pedidos">Mis pedidos</a>
			<a href="./index.php?accio=logout">Cerrar sesión</a>
		</div>
		</div>

		<div class="dropdown">
		<button onclick="menu_desplegable_carrito()" class="dropbtnc">Menu carrito</button>
        <div id="myDropdownCarrito" class="dropdown-content">
        	<a href="#" onclick="loadCarrito()">Ver carrito</a>
        	<a href="#" onclick="vaciarCarrito()">Vaciar carrito</a>
		</div>
		</div>
        <?php } ?>
	</nav>