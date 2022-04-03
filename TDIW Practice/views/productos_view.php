<?php  
		foreach($productos as $producto){
			?>
			<div id="<?php echo $producto['ID_Producto'];?>">
			<a href="#" onclick="loadDetalles(<?php echo $producto['ID_Producto'];?>);"><h4><?php echo $producto['Nombre']; ?></h4></a><br>
			<a href="#" onclick="loadDetalles(<?php echo $producto['ID_Producto'];?>);">
			<img class="imgMenu" src="/../<?php echo $producto['Imagen']; ?>" alt="imagen producto <?php echo $producto['ID_Producto'];?>"></a><br>
			<h4>Precio: <?php echo $producto['Precio']; ?>€</h4><br>
			<?php
            //-----------------------SI NO HAY SESIÓN ACTIVA --> MOSTRAMOS BOTON FALSO
        	if(!isset($_SESSION['ID'])) {
        	?>
				<button class="button" onclick="gotoLogin();">INICIA SESION.</button>
			<?php
			//-----------------------SI HAY SESIÓN ACTIVA --> MOSTRAMOS BOTON AÑADIR CARRITO
			}else{ ?>
					<input id='Cantidad_<?php echo $producto['ID_Producto'];?>' name="Cantidad_<?php echo $producto['ID_Producto'];?>" type="number" min="1" max="10" step="1" value="1" data-inc="1">
					<br>
					<button onclick="addcarrito(<?php echo $producto['ID_Producto']?>);" class="button">Añadir carrito.</button>
			<?php } ?>
			</div>
<?php } ?>