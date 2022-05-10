<?php
include 'config/conexion.php';

$email  = $_POST['email'];
$pass   = $_POST['pass']; // paso.paso1

if(!empty($email) && !empty($pass)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
        $sql = "select * from usuarios where email = '$email'";
        $result = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($result) == 1){
            $fila = mysqli_fetch_assoc($result);

            $pass_bd = $fila['password'];
            $pass_md5 = md5($pass);

            if($pass_bd == $pass_md5) {
                header("location: proposito/index.php");
                exit;
            }
        }
    }
}

header("location: index.php?msg=1");
?>