<?php
include '../config/conexion.php';
$id = $_GET['id'];
if(!empty($id) && is_numeric($id)){
    $delete = "delete from propositos where id = $id";
    $result = mysqli_query($conexion, $delete);

    if($result){
        header('location: index.php');
    }
}

?>