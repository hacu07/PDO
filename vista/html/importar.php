<!DOCTYPE html>
<html>
<head>
	<title>Importar Clientes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="vista/css/estilos.css" >

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="vista/js/filestyle.min.js"> </script>

</head>
<body>
	<div id="contenedorImportar" class="container">
		<div id="frmExcel" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<!-- Formulario de carga -->
			<form action="index.php?accion=cargarclientes" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" class="form-control col-xs-12 col-sm-12 col-md-6 col-lg-6"  name="excel" data-buttonText="Seleccione archivo">
				</div>
				<div class="form-group">
					<input class="form-control col-xs-12 col-sm-12 col-md-6 col-lg-6 btn-primary" type="submit" name="enviar" value="Importar">
				</div>				
			</form>	
		</div>
		<div id="divTblCli" class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<table class="table">
				<thead>
					<tr><th>Identificador</th><th>Nombre Cliente</th><th>Numero Celular</th><th>Correo Electronico</th></tr>
				</thead>
				<tbody>
					<?php foreach ($resultado as $cliente) : ?>
					<tr>
						<td><?php echo $cliente['id']; ?></td>
						<td><?php echo $cliente['nombre']; ?></td>
						<td><?php echo $cliente['celular']; ?></td>
						<td><?php echo $cliente['correo']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		 
	</div>
</body>
</html>