<?php
include '../config/conexion.php';

$id             = $_POST['id_proposito']; //hidden
$proposito      = $_POST['proposito'];
$vencimiento    = $_POST['vencimiento'];

$update = "update propositos set
            proposito = '$proposito',
            vencimiento = '$vencimiento'
            where id = $id";

$result = mysqli_query($conexion, $update);

if($result){ //se ejecutó correctamente
    header('location: index.php');
}
?>