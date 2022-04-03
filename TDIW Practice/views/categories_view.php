<section>
		<?php
		foreach($result as $categoria){
			$categoria['Nombre'] = htmlentities($categoria['Nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
			$categoria['ID_Categoria'] = htmlentities($categoria['ID_Categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
			?>
			<div id="<?php echo $categoria['ID_Categoria'];?>">
			<a href="#" onclick="loadProductos(<?php echo $categoria['ID_Categoria'];?>);"><h4><?php echo $categoria['Nombre']; ?></h4></a><br>
			<a href="#" onclick="loadProductos(<?php echo $categoria['ID_Categoria'];?>);">
			<img class="imgMenu" src="/../<?php echo $categoria['Imagen']; ?>" alt="imagen categoria <?php echo $categoria['ID_Categoria'];?>"></a>
			</div>
		<?php
		}?>
</section>
