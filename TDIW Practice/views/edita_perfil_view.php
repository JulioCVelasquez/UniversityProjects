<section id="edita_perfil">
	<form action="./index.php?accio=edita_perfil" method="post" enctype="multipart/form-data">
		<fieldset>
				<H3>EDITA PERFIL</H3><br>	
				Nombre:<br>
				<input type="text" id="userName" name="userName" pattern="[a-zA-Z\s]+" title="Introduce solo letras o espacios."  value="<?php echo $_SESSION['nombre']; ?>"><br>
				Correo:<br>
				<input type="email" id="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Introduce un email válido nombre@mail.dominio" value="<?php echo $_SESSION['usuario']; ?>"><br>
				Contraseña actual:<br>
				<input type="password" id="passW" name="passW" pattern="[a-zA-Z0-9]+"
				title="Solo letras y números." required><br>
				Contraseña nueva:<br>
				<input type="password" id="npassW" name="npassW" pattern="[a-zA-Z0-9]+"
				title="Solo letras y números."><br>
				Dirección:<br>
				<input type="text" id="direccion" name="direccion" maxlength="30" pattern="[a-zA-Z0-9\s]+" title="30 characters max solo letras, números o espacios." value="<?php echo $_SESSION['direccion']; ?>"><br>
				Población:<br>
				<input type="text" id="country" name="country" maxlength="30" pattern="[a-zA-Z\s]+" title="30 characters max solo letras y números." value="<?php echo $_SESSION['poblacion']; ?>"><br>
				Código Postal:<br>
				<input type="text" id="postalCode" name="postalCode" pattern="[0-9]{5}$" title="Introduce 5 dígitos" value="<?php echo $_SESSION['postal']; ?>"><br>
				Imagen de perfil:<br>
				<?php if((empty($_SESSION['Imagen'])) || (!isset($_SESSION['Imagen']))){ ?>
					<img class="imgUser" src="/../imagenesUser/no_img.png" alt="imagenPerfil">
				<?php }else{ ?>
					<img class="imgUser" src="/../imagenesUser/<?php echo $_SESSION['Imagen'];?>" alt="<?php echo $_SESSION['Imagen']; ?>">
				<?php } ?>
				<br>
				<input type="file" id="foto "name="foto"><br>
				<br>
				<input type="submit" value="Guarda cambios.">
		</fieldset>
	</form>
	<div>
</section>

