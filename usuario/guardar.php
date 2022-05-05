<?php
/*Lógica para guardar los datos de un nuevo usuario*/
include '../config/conexion.php';

$email  = $_POST['email'];
$name   = $_POST['name'];
$pass1  = $_POST['pass1'];
$pass2  = $_POST['pass2'];

$password_en_md5 = md5($pass1);

$insert = "insert into usuarios (email, nombre, password, creacion) values ('$email', '$name', '$password_en_md5', NOW())";
$result = mysqli_query($conexion, $insert);

if($result){
    header('Location: ../index.php');
}else{
    echo 'Error en BD: ' . mysqli_error($conexion);
}
?>