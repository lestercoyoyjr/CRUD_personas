<?php

    require 'conexion.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $estado_civil = $_POST['estado_civil'];
    $hijos = isset ($_POST['hijos']) ? $_POST['hijos'] : 0;
    $intereses = isset ($_POST['intereses']) ? $_POST['intereses'] : null;

    $arrayIntereses = null;
	
	$num_array = count($intereses);
	$contador = 0;
	
	if($num_array>0){
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1)
			$arrayIntereses .= $value.' ';
			else
			$arrayIntereses .= $value;
			$contador++;
		}
	}
    
    // Esto es lo que cambiamos de la consulta 
    $sql = "UPDATE personas SET nombre='$nombre', correo='$email', telefono='$telefono', estado_civil='$estado_civil', hijos='$hijos', intereses='$arrayIntereses' WHERE id = '$id'";

    // llamar a la variable y funcion de conexion
    $resultado = $mysqli->query($sql);
?>

<!--Empezamos con HTML-->
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
                    <!--Usar php ya que resultado es un valor tipo bool-->
                    <?php if($resultado) {?>
                        <h3>REGISTRO MODIFICADO</h3>
                    <?php } else {?>
                        <h3>ERROR AL MODIFICAR</h3>
                    <?php } ?>
                    <!--boton-->
                    <a href="index.php" class="btn btn-primary" style="width:150px;height:40px">Regresar</a>
                </div>
            </div>

        </div>
    </body>
</html>