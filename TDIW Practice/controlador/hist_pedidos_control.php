<?php
	require_once __DIR__.'/../model/hist_pedidos_model.php';

	$pedidos = getPedidos($_SESSION['ID']);

	if(!empty($pedidos))
	{
		$ID = 0;
		$_SESSION['linias_pedidos'] = array();
		for ($i =0; $i<sizeof($pedidos); $i++)
		{
			$ID = $pedidos[$i]['ID_Pedido'];
			$lineas = getLineas($ID);
			for($x = 0; $x < sizeof($lineas); $x++){
				$_SESSION['linias_pedidos'][$ID][$x]['Nombre'] = $lineas[$x]['Nombre'];
				$_SESSION['linias_pedidos'][$ID][$x]['Cantidad'] = $lineas[$x]['Cantidad'];
				$_SESSION['linias_pedidos'][$ID][$x]['Precio'] = $lineas[$x]['Precio_Total'];
			}
		}
	}

	include __DIR__.'/../views/hist_pedidos_view.php';
?>
