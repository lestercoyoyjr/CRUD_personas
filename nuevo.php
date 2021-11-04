<html lang="es">
    <head>
        <!--Para que se adapte a cualquier dispositivo-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Las librerias de estilo-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <!--Titulo-->
            <div class="row">
				<h3 style="text-align:center"> <br> NUEVO REGISTRO </h3>
		    </div>

            <!--Formulario-->
            <!--Metodo en PHP para enviar el formulario-->
            <form class="form-horizontal" method="POST" action="guardar.php" enctype="multipart/form-data" autocomplete="off">		    
                <br>
                <!--Nombre-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    </div>
					<div class="col-sm-11">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
			    </div>
                <br>
                <!--Email-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                    </div>
					<div class="col-sm-11">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
                </div>
                <br>
                <!--Telefono-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                    </div>
                    <div class="col-sm-11">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
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
						    <option value="SOLTERO">Soltero</option>
						    <option value="CASADO">Casado</option>
						    <option value="OTRO">Otro</option>
					    </select>
                    </div>
                </div>
                <br>
                <!--Hijos-->
                <div class="row">
                    <div class="col-sm-1">
                        <label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>
                    </div>
                    <div class="col-sm-11">
                        <label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="1" checked> SI
						</label>
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="0"> NO
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
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros"> Libros &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica"> Musica &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes"> Deportes &nbsp
						</label>
                        <label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros"> Otros &nbsp
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
                        <!--input type="file" class="form-control" id="archivo" accept="image/*" name="archivo"-->
                        <!--accept="application/pdf"-->
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