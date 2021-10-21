<?php

$mysqli = new mysqli('localhost', 'root', '', 'personal');
                     // server, user, password, db

if ($mysqli->connect_error){
    die('Error en la conexion'.$mysqli->connect_error);
    
}
else{
    
    printf("Conexion exitosa: %s\n", $mysqli->server_info);
    // always close the connection
    //mysqli_close($mysqli);
}

?>