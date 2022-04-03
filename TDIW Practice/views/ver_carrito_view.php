<?php  
		 //-----------------------SI NO HAY PRODUCTOS EN CARRITO --> MOSTRAMOS MENSAJE
        if(empty($_SESSION['carrito']['productos'])) {
       	?>	<div>
			<p><h1 style="color:red;">¡EL CARRITO ESTA VACIO!</h1></p>
		</div>
		<?php 
		//-----------------------SI HAY PRODUCTOS EN CARRITO--> MOSTRAMOS LOS PRODUCTOS DEL CARRITO
		}else{ ?>

		<table>
            	<tr>
                	<th>Imagen</th>
                	<th>Nombre</th>
                	<th>Precio</th>
                	<th>Cantidad</th>
            	</tr>
            <?php
			foreach ($_SESSION['carrito']['productos'] as $item) {
			?>
				<tr>
					<td>
						<img class="imgUser" src="/../<?php echo $item['Imagen']; ?>" alt="imagen producto <?php echo $item['ID_Producto']; ?>">
					</td>
					<td>
						<h4><?php echo $item['Nombre']; ?></h4>
					</td>
					<td>
						<h4><?php echo $item['Precio']; ?>€</h4>
					</td>
					<td>
						<h4>Cantidad: <?php echo $item['cant'];?></h4>
					</td>
				</tr>
			<?php } ?>
				<tr>
					<td>
						<button class="button" onclick="confirmarCompra()">Confirmar compra.</button>
					</td>
					<td>
						<button class="button" onclick="vaciarCarrito()">Vaciar carrito.</button>
					</td>
					<td>
						<h4>Precio total: Precio Total: <?php echo $_SESSION['carrito']['total_import'];?>€</h4>
					</td>
					<td>
						<h4>Total productos: <?php echo $_SESSION['carrito']['total_items'];?></h4>
					</td>
				</tr>
		</table>

<?php } ?>