<section id="registro">
	<form action="./index.php?accio=registro" method="post" onsubmit="return validarRegistro()">
		<fieldset>
				<H3>REGISTRO</H3><br>	
				Nombre:<br>
				<input type="text" id="userName" name="userName" pattern="[a-zA-Z\s]+" title="Introduce solo letras o espacios."required><br>
				Correo:<br>
				<input type="email" id="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Introduce un email válido nombre@mail.dominio" required><br>
				Contraseña:<br>
				<input type="password" id="passW" name="passW" pattern="[a-zA-Z0-9]+"
				title="Solo letras y números." required><br>
				Dirección:<br>
				<input type="text" id="direccion" name="direccion" maxlength="30" pattern="[a-zA-Z0-9\s]+" title="30 characters max solo letras, números o espacios." required><br>
				Población:<br>
				<input type="text" id="country" name="country" maxlength="30" pattern="[a-zA-Z\s]+" title="30 characters max solo letras y números." required><br>
				Código Postal:<br>
				<input type="text" id="postalCode" name="postalCode" pattern="[0-9]{5}$" title="Introduce 5 dígitos"required><br>
				<br>
				<input type="submit" value="Registrate">
		</fieldset>
	</form>
</section>

