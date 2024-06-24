<?php

$conexion = mysqli_connect("localhost","root","","casino");
if ($conexion){

    echo 'Conectado correctamente a la BD';
}else{
    echo 'No se pudo conectar a la BD';
}

?>