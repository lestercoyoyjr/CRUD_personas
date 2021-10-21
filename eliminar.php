<?php
	
	require 'conexion.php';

	// IMPORTANTE: No mediante POST, sino GET, pues recibimos
	// la url del registro
	$id = $_GET['id'];
	
	// Instruccion para eliminar
	$sql = "DELETE FROM personas WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<!--Para que se adapte a cualquier dispositivo-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Las librerias de estilo-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<!--boton-->
				<a href="index.php" class="btn btn-primary" style="width:150px;height:40px">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
