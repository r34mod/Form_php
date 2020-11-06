<?php
    require_once('conexion.php');
    $nombre = $_POST['login'];
    $pwd = $_POST['password'];
    $pwd_cifrada = MD5($pwd);

    $sql = "SELECT usuario, contra FROM usr_pwd WHERE usuario='$nombre'
         AND contra='$pwd_cifrada'";
    
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $nombre = $row["usuario"];
            session_start();
            $_SESSION['nombre']=$nombre;
            
        }
        header('location: ../Vistas/menuBotones.php');
    }else {
        header('location: registrar.php');
    }

?>