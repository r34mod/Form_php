<?php

function loggin(){

    $usuario = $_POST['user'] ?? '';
    $clave = $_POST['psw'] ?? '';

    $resultado = $stm->fetch(PDO::FECTH_ASSOC);
    $token=$resultado['token'];
    if($_SESSION["token"]!=$token){
        header('location: login.php?error=login');
    }
}



function sessionIn() {
    session_start();
    if (isset($_SESSION['user'])) {
        return;
    }
    if (isset($_POST['user']) && isset($_POST['psw'])) {
        sessionLogin();
        return;
    }
    header('location: login.php?error=login');
}

?>