<?php
define('DB_HOST', '35.202.106.35');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conexion === false){ //¿error?
    exit('Error en la conexión con la bd');
}

mysqli_set_charset($conexion, 'utf8');
?>
