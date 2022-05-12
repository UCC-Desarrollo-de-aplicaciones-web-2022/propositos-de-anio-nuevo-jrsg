<?php
session_start();

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
                $_SESSION['id']     = $fila['id'];
                $_SESSION['email']  = $fila['email'];
                $_SESSION['nombre'] = $fila['nombre'];

                header("location: proposito/index.php");
                exit;
            }else{
                echo 'if 4';
            }
        }else{
            echo 'if 3';
        }
    }else{
        echo 'if 2';
    }
}else{
    echo 'if 1';
}

//header("location: index.php?msg=1");
?>