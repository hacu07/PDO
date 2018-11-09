<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro - PDO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="vista/css/estilos.css">
	<script src="vista/jquery/jquery.js"></script>
	<script src="vista/js/validarLogin.js"></script>
</head>
<body>
	<div id="form">
		<div id="form_header">
			<h1>PDO - Registro</h1>
		</div>
		<div id="form_body">
			<form action="index.php?accion=registrar" method="post">
				<div class="input_group">
					<input type="text" id="registroNombre" name="nombre" required="required">
					<label  class="label" for="registroNombre">Nombres:</label>
				</div>
				<div class="input_group">
					<input type="text" id="registroUsuario" name="usuario" required="required">
					<label  class="label" for="registroUsuario">Usuario</label>
				</div>
				<div class="input_group">
					<input type="number" id="registroTelefono" name="telefono" required="required">
					<label  class="label" for="registroTelefono">Telefono</label>
				</div>
				<div class="input_group">
					<input type="email" id="registroCorreo" name="correo" required="required">
					<label  class="label" for="registroCorreo">Correo</label>
				</div>
				<div class="input_group_radio">
					<p>Genero:</p>

					<input id="masculino" type="radio" value="M" name="genero" required="required">
					<label for="masculino">Masculino</label>

					<input id="femenino" type="radio" value="F" name="genero" required="required">
					<label for="femenino">Femenino</label>
				</div>
				<div class="input_group">
					<input type="password" id="loginPassword" name="password" required="required">
					<label class="label" for="loginPassword">Contraseña</label>
				</div>
				<input type="submit" class="btn btn-primary" value="Registrate">
				<a href="index.php" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</body>
</html>