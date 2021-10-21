<!--Realizaremos una consulta para mostrar la tabla-->
<?php
    require 'conexion.php';
	
	$where = "";
	
	if(!empty($_POST))
	{
		// Se ingresa el empty nuevamente en caso este
        // vacio el registro
        $valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor%'";
		}
	}
	$sql = "SELECT * FROM personas $where";
	$resultado = $mysqli->query($sql);
?>

<html lang="es">
    <head>
        <!--Para que se adapte a cualquier dispositivo-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Las librerias de estilo-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--link rel="stylesheet" href="css/bootstrap-theme.css"-->
        <script src="js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.2/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!--Si quieres que los glyphicons sirvan necesitas esto-->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    </head>

    <body>
        <div class="container">
            <!--Titulo -->
            <div class="row">
                <h1 style="text-align:center"> <br> Curso de PHP y MySQL </h1>
            </div>
            <!--Agregar un link con boton-->
            <div class="row">
                <div class="col-sm-8">
                    <!--Boton nuevo registro-->
                    <a href="nuevo.php" target="_blank" class ="btn btn-primary" style="width:150px;height:30px" style="text-align:left" style="font-size:" border-radius= "15px"> Nuevo Registro </a>
                </div>
                <div class="col-sm-4">
                    <!--Boton buscar-->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					    <b>Nombre: </b><input type="text" id="campo" name="campo" />
					    <input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
				    </form>
                </div>
            </div>
            <br>
            <!--tabla-->
            <div class="row table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Esto nos envia todos los parametros de la base de datos-->
                        <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <!--Modificar-->
                            <td><a href="modificar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <!--Eliminar-->
							<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--Modal-->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    Eliminar Registro
                    </div>
                    <div class="modal-body">
                        Esta seguro de Eliminar este Registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!--JQuery script-->
        <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        </script>	
    </body>
</html>