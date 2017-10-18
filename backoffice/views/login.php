
<div id="backLogin">

	<form method="post" id="formLogin" onsubmit="return validateLogin()">

		<h1 id="formLoginTitle">INGRESO AL PANEL DE CONTROL</h1>
		<input class="form-control formLogin" type="text" placeholder="Introduzca Usuario" name="userLogin" id="userLogin">
		<input class="form-control formLogin" type="password" placeholder="Introduzca Contraseña" name="passwordLogin" id="passwordLogin">

		<?php			
			$ingreso = new Login();
			$ingreso -> loginController();			
		?>

		<input class="form-control formLogin btn btn-primary" type="submit" value="Enviar">
	</form>

</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->