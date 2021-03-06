<?php

    require 'conexion.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM personas WHERE id = '$id'";
    $resultado = $mysqli->query($sql);

    $row = $resultado->fetch_array(MYSQLI_ASSOC);
?>

<!--Empezamos con HTML-->
<html lang="es">
    <head>
        <!--Para que se adapte a cualquier dispositivo-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Las librerias de estilo-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">

        <!--Usar fontawesome ya que glyphicon no tiene soporte a partir de bootstrap 3.3 o si lo tiene se ve mal-->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"-->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!--Eliminar con trash-->
        <script type="text/javascript">
            $(document).ready(function() {
               $('.delete').click(function (){
                    var parent = $(this).parent().attr('id');
                    var service = $(this).parent().attr('data');
                    var dataString = 'id='+service;

                    $.ajax({
                        type: 'POST',
                        url: "del_file.php",
                        data: dataString,
                        success: function(){
                            location.reload();
                        }  
                    });

               });
            });
        </script>

    </head>

    <body>
        <div class="container">
            <!--Titulo-->
            <div class="row">
				<h3 style="text-align:center"> <br> MODIFICAR REGISTRO </h3>
		    </div>

            <!--Formulario-->
            <!--Metodo en PHP para enviar el formulario-->
            <form class="form-horizontal" method="POST" action="update.php" enctype="multipart/form-data" autocomplete="off">		    
                <br>
                <!--Nombre-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    </div>
					<div class="col-sm-11">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']?>" required>
					</div>
			    </div>
                <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                <br>
                <!--Email-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                    </div>
					<div class="col-sm-11">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['correo']?>" required>
					</div>
                </div>
                <br>
                <!--Telefono-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                    </div>
                    <div class="col-sm-11">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']?>">
					</div>
			    </div>
                <br>
                <!--Estado Civil-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
                    </div>
                    <div class="col-sm-11">
                        <select class="form-control" id="estado_civil" name="estado_civil">
                            <!--If para los select-->
						    <option value="SOLTERO" <?php if ($row['estado_civil'] == 'Soltero') echo 'selected'; ?>>Soltero</option>
						    <option value="CASADO" <?php if ($row['estado_civil'] == 'Casado') echo 'selected'; ?>>Casado</option>
						    <option value="OTRO" <?php if ($row['estado_civil'] == 'Otro') echo 'selected'; ?>>Otro</option>
					    </select>
                    </div>
                </div>
                <br>
                <!--Hijos-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="hijos" class="col-sm-2 control-label">??Tiene Hijos?</label>
                    </div>
                    <!--If para mostrar opciones check-->
                    <div class="col-sm-11">
                        <label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" <?php if ($row['hijos'] == '1') echo 'checked'; ?>> SI
						</label>
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0" <?php if ($row['hijos'] == '0') echo 'checked'; ?>> NO
						</label>
                    </div>
                </div>
                <br>
                <!--Intereses-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="intereses" class="col-sm-2 control-label">INTERESES</label>
                    </div>
                    <div class="col-sm-11">
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros" <?php if (strpos($row['intereses'], "Libros") != 'false') echo 'checked'; ?>> Libros &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica" <?php if (strpos($row['intereses'], "Musica") != 'false') echo 'checked'; ?>> Musica &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes" <?php if (strpos($row['intereses'], "Deportes") != 'false') echo 'checked'; ?>> Deportes &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros" <?php if (strpos($row['intereses'], "Otros") != 'false') echo 'checked'; ?>> Otros &nbsp
						</label>
                    </div>
                </div>
                <br>

                <!--Subir imagen-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="archivo" class="col-sm-2 control-label">Archivo</label>
                    </div>
					<div class="col-sm-11">
						<input type="file" class="form-control" id="archivo" name="archivo">
                        <!-- modificar imagen -->
                        <br>
                        <br>
                        <br>

                        <?php
                            $path = "files/".$id;
                            if(file_exists($path)){
                                $directorio = opendir($path);
                                while($archivo = readdir($directorio))
                                {
                                    if(!is_dir($archivo)){

                                        echo "<div data = '".$path."/".$archivo."'><a href='".$path."/".$archivo."'title='Ver Archivo Adjunto'><span class = 'icon-picture'></span></a>";
                                        echo "$archivo <a href='#' class = 'delete' title = 'Ver Archivo Adjunto'><span class = 'icon-trash' aria-hidden = 'true'></span></a></div>";
                                        echo "<img src='files/$id/$archivo' width='400'/>";
                                    }
                                }
                            }
                        ?>
					</div>
			    </div>
                <br>

                <!--Guardar y Regresar-->
                <div class="row">
                    <!--La primera solo sirve para tabular-->
                    <div class="col-sm-5">
                        <!--no contiene nada-->
                    </div>
                    <!--Estos ya son los botones-->
                    <div class="col-sm-1">
                        <a href="index.php" class="btn btn-default" >Regresar</a>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>