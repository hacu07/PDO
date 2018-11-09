<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - PDO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="vista/css/estilos.css">
	<script src="vista/jquery/jquery.js"></script>
	<script src="vista/js/validarLogin.js"></script>
</head>
<body>
	<div id="form">
		<div id="form_header">
			<h1>PDO - <?php echo $_SESSION["usuario"]; ?></h1>
		</div>
		<div id="form_body">
			<?php 
				if(isset($_GET["actualizar"])){
					if($_GET["actualizar"]=="succes"){
						?>
						<div class="loginSucces">
							¡Los datos se actualizaron correctamente!
						</div>
						<?php
					}
					if ($_GET["actualizar"]=="error") {
						?>
						<div class="loginError">


						¡Ocurrio un error al momento de actualizar los datos, por favor intente nuevamente!
						</div>
						<?php
					}
				} 
				?>
			<a href="index.php?accion=editar" class="btn btn-primary">Editar datos</a>
			<a href="index.php?accion=logout" class="btn btn-default">Cerrar sesión</a>
			<a href="index.php?accion=eliminar" class="btn btn-danger">Eliminar usuario</a>
			<a href="index.php?accion=importar" class="btn btn-primary">Importar Clientes</a>
		</div>
	</div>
</body>
</html>




