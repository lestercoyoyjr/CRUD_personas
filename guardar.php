<?php

    require 'conexion.php';

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

    $sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$nombre','$email', '$telefono','$estado_civil', '$hijos', '$arrayIntereses')";

    // llamar a la variable y funcion de conexion
    $resultado = $mysqli->query($sql);
    $id_insert= $mysqli->insert_id;

    // agregar el registro para imagen
    if ($_FILES["archivo"]["error"]>0){
        echo "Error al cargar archivo";
    }
    else{
        // $permitidos = array("image/*");
        $permitidos = array("image/*");
        $limite_kb = 3000;
        
        // Si el archivo es permitido y no hay problema con el tamanyo, entonces procede a guardar
        if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024){
            // indicaremos la ruta en la que se va a guardar
            $ruta = 'files/'.$id_insert.'/';
            $archivo = $ruta.$_FILES["archivo"]["name"];

            // para crear la ruta si en caso no existe
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
            
            // en caso el archivo ya existe
            if(!file_exists($archivo)){
                $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
                
                if($resultado){
                    echo "Archivo Guardado";
                }
                else{
                    echo "error al guardar archivo";
                }
            }
            else{
                echo "archivo ya existe";
            }
        }
        else{
            echo "archivo no permitido o excede el tamanyo";
        }
    }
    
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
                        <h3>REGISTRO GUARDADO</h3>
                    <?php } else {?>
                        <h3>ERROR AL GUARDAR</h3>
                    <?php } ?>
                    <!--boton-->
                    <a href="index.php" class="btn btn-primary" style="width:150px;height:40px">Regresar</a>
                </div>
            </div>

        </div>
    </body>
</html>