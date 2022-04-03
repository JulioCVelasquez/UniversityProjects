<?php
	require_once __DIR__.'/../model/categories_model.php';

	$productos = getProductosDeCategoria($categoria);

	include __DIR__.'/../views/productos_view.php';
?>
