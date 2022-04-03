<section>	
	<?php if(empty($pedidos)){ ?>

		<div>
			<h1 style="color: red;">¡AUN NO HAS HECHO NINGUN PERDIDO!</h1>
		</div>

	<?php }else{ 
		foreach ($pedidos as $pedido){?>
		<table>
            	<tr>
                	<th>ID pedido</th>
                	<th>Fecha de compra</th>
                	<th>Numero de productos</th>
                	<th>Precio total</th>
            	</tr>

				<tr>
					<td>
						<h4><?php echo $pedido['ID_Pedido'];?></h4>
					</td>
					<td>
						<h4><?php echo $pedido['Fecha_Pedido'];?></h4>
					</td>
					<td>
						<h4><?php echo $pedido['Numero_Elementos'];?></h4>
					</td>
					<td>
						<h4><?php echo $pedido['Precio'];?>€</h4>
					</td>
				</tr>
		</table>
		<br><br>

			<?php 
			$idped = $pedido['ID_Pedido'];?>

			<?php foreach ($_SESSION['linias_pedidos'][$idped] as $item){?>
		<table>
				<tr>
                	<th>Nombre</th>
                	<th>Cantidad</th>
                	<th>Precio total</th>
            	</tr>
				<tr>
					<td>
						<h4><?php echo $item['Nombre'];?></h4>
					</td>
					<td>
						<h4><?php echo $item['Cantidad'];?></h4>
					</td>
					<td>
						<h4><?php echo $item['Precio'];?>€</h4>
					</td>
				</tr>
		</table>
		<br>
			<?php } ?><br>
		<?php } ?>
	<?php } ?>

</section>