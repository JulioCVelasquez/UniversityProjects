<?php
	require_once __DIR__.'/../model/categories_model.php';

	$producto_detalle = getDetall_Producte($producto);

	include __DIR__.'/../views/detall_producto_view.php';
?>
