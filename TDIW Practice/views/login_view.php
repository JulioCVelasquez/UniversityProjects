<section id="login">
	    <form action="./index.php?accio=login" method="post">
	    	<fieldset>
				<H3>LOGIN</H3><br>
				Correo:<br>
				<input type="email" id="mail" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Introduce un email válido nombre@mail.dominio" required><br>
				Contraseña:<br>
				<input type="password" id="passW" name="passW" pattern="[a-zA-Z0-9]+"
				title="Solo letras y números." required><br>
				<br><br>
				<input type="submit" value="Login">
			</fieldset>
		</form>
</section>
