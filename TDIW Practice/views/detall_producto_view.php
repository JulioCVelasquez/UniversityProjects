<div>
		<ul><h4><?php echo($producto_detalle[0]['Nombre']);?></h4></ul>
		<ul><h4>Descripción:</h4></ul>
		<ul><p><?php echo($producto_detalle[0]['Descripcion']);?></p></ul>
		<ul><img class="imgMenu" src="/../<?php echo $producto_detalle[0]['Imagen']; ?>" alt="imagen producto <?php echo $producto_detalle[0]['ID_Producto']; ?>"></ul>
		<ul><h4>Precio: <?php echo($producto_detalle[0]['Precio']);?>€</h4></ul>
		<?php
        //-----------------------SI NO HAY SESIÓN ACTIVA --> MOSTRAMOS BOTON FALSO
 		if(!isset($_SESSION['ID'])) {
        ?>
			<button class="button" onclick="gotoLogin();" >INICIA SESION.</button>
		<?php 
		//-----------------------SI HAY SESIÓN ACTIVA --> MOSTRAMOS BOTON AÑADIR CARRITO
		}else{ ?>
				<input id='Cantidad_<?php echo $producto_detalle[0]['ID_Producto']; ?>' name="Cantidad_<?php echo $producto_detalle[0]['ID_Producto']; ?>" type="number" min="1" max="10" step="1" value="1" data-inc="1">
				<br>
				<button onclick="addcarrito(<?php echo $producto_detalle[0]['ID_Producto']; ?>);" class="button">Añadir carrito.</button>
		<?php } ?>
</div>