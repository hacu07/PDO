<!DOCTYPE html>
<html manifest="demo.appcache" lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login - PDO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="vista/css/estilos.css">
	<script src="vista/jquery/jquery.js"></script>
	<script src="vista/js/validarLogin.js"></script>
</head>
<body>
	<div id="form">
		<div id="form_header">
			<h1>PDO - Login</h1>
		</div>
		<div id="form_body">
			<?php 
			if (isset($_GET["error"])) {
				$mensaje = "Error";
				if($_GET["error"]==1){
					$mensaje = "¡La contraseña ingresada es incorrecta!";
				}
				if($_GET["error"]==2){
					$mensaje = "¡El usuario ingresado no corresponde a ninguna cuenta!";
				}
				?>
				<div class="loginError">
				<?php echo $mensaje; ?>
				</div>
				<?php
			}
			if (isset($_GET["succes"])) {
				?>
				<div class="loginSucces">
				¡El usuario fue registrado  correctamente!
				</div>
				<?php
			}
			 ?>
			<form action="index.php?accion=login" method="post">
				<div class="input_group">
					<input type="text" id="loginUsuario" name="user" required="required">
					<label  class="label" for="loginUsuario">Usuario</label>
				</div>
				<div class="input_group">
					<input type="password" id="loginPassword" name="pass" required="required">
					<label  class="label" for="loginPassword">Contraseña</label>
				</div>
				<input type="submit" class="btn btn-primary" value="Iniciar sesión">
				<a href="index.php?accion=registro" class="btn btn-default">Registrarse</a>
			</form>
		</div>
	</div>
</body>
</html>