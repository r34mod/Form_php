<?php
    require_once('conexion.php');
  

    $name = $_POST['usu'];
    $pwd = $_POST['contra'];

    $password = MD5($pwd);


    $sql = "INSERT INTO usr_pwd (usuario, contra) VALUES
            ('$name', '$password')";

    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: login.php");
    }else {
        echo "ERROR: ".$sql;
    }



?>