<?php

include __DIR__.'/../model/confirmar_compra_model.php';

	$fecha = 0;
	$n_elementos = 0;
	$precio_total = 0;
	$user_id = 0;
	$pedido = 0;
	$pedido_id = 0;
	$cant = 0;
	$prod_id = 0;
	$prod_name = 0;
	$precio_unitario = 0;
	$precio_ptotal = 0;


	$fecha = date('Y-m-d',time());
	$n_elementos = $_SESSION['carrito']['total_items'];
	$precio_total = $_SESSION['carrito']['total_import'];
	$user_id = $_SESSION['ID'];


	guardar_Pedido($fecha, $n_elementos, $precio_total, $user_id);

	$pedido = getPedidosID($user_id);
	$pedido_id = $pedido[0]['ID_Pedido'];



	foreach ($_SESSION['carrito']['productos'] as $item) {

		$cant = $item['cant'];
		$prod_id = $item['ID_Producto'];
		$prod_name = $item['Nombre'];
		$precio_unitario = $item['Precio'];
		$precio_ptotal = $item['total_precio'];

		guardar_Linia_Pedido($cant, $pedido_id, $prod_id, $prod_name, $precio_unitario, $precio_ptotal);
	
	}

	include __DIR__.'/../views/confirmar_compra_view.php';

	unset($_SESSION['carrito']);
	$_SESSION['carrito']['total_items'] = 0;
	$_SESSION['carrito']['total_import'] = 0;
	$_SESSION['carrito']['productos'] = array();
?>