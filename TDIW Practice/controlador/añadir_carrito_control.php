<?php

$precio = 0;
$prod = 0;

//Estructura de nuestro carrito
//$_SESSION['carrito']['total_items'];
//$_SESSION['carrito']['total_import'];
//$_SESSION['carrito']['productos'][$pID]['Categoria_ID'];
//$_SESSION['carrito']['productos'][$pID]['Nombre'];
//$_SESSION['carrito']['productos'][$pID]['ID_Producto'];
//$_SESSION['carrito']['productos'][$pID]['Imagen'];
//$_SESSION['carrito']['productos'][$pID]['cant'];
//$_SESSION['carrito']['productos'][$pID]['Precio'];
//$_SESSION['carrito']['productos'][$pID]['total_precio'];

if(isset($_SESSION['carrito']['productos'][$pID])){
    
	$_SESSION['carrito']['productos'][$pID]['cant'] += $cantidad;

}else{
	//conexion a la bd para sacar datos del producto
	require_once __DIR__.'/../model/categories_model.php';
	$prod = getDetall_Producte($pID);

	$_SESSION['carrito']['productos'][$pID]['Categoria_ID'] = $prod[0]['Categoria_ID'];
	$_SESSION['carrito']['productos'][$pID]['Nombre'] = $prod[0]['Nombre'];
	$_SESSION['carrito']['productos'][$pID]['ID_Producto'] = $prod[0]['ID_Producto'];
	$_SESSION['carrito']['productos'][$pID]['Imagen'] = $prod[0]['Imagen'];
    $_SESSION['carrito']['productos'][$pID]['cant'] = $cantidad;
    $_SESSION['carrito']['productos'][$pID]['Precio'] = $prod[0]['Precio'];
}

$cantidad = $_SESSION['carrito']['productos'][$pID]['cant'];
$precio = $_SESSION['carrito']['productos'][$pID]['Precio'];
$_SESSION['carrito']['productos'][$pID]['total_precio'] = $precio * $cantidad;

$_SESSION['carrito']['total_items'] = 0;
$_SESSION['carrito']['total_import'] = 0;

foreach ($_SESSION['carrito']['productos'] as $item) {
	$_SESSION['carrito']['total_items'] += $item['cant'];
	$_SESSION['carrito']['total_import'] += $item['total_precio'];
}
//echo 'alert("El producto se ha añadido al carrito.");';
$categoria = $_SESSION['carrito']['productos'][$pID]['Categoria_ID'];
?>