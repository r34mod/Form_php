<?php
/**
 * Comprueba que el usuario y clave pasados corresponde
 * a alguno de los existentes en fichero de claves.
 * 
 * Si no se manda a la página de login.
 */


 require_once('../Inicio/conexion.php');

const COMA = ',';


function sessionLogin() { 
    // Viene del formulario de entrada

    $nombre = $_POST['usuario'] ?? '';
    $pwd = $_POST['contra'] ?? '';
    $pwd_cifrada = MD5($pwd);

    $sql = "SELECT usuario, contra FROM user_pwd WHERE usuario='$nombre'
         AND contra='$pwd_cifrada'";
    
    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $usuario = $row["usuario"];
            $clave = $row["contra"];
            session_start();
            $_SESSION['usuario']=$usuario;
            return;
        }
        header('location: ../Vistas/menuBotones.php');
    }else {
        header('location: ../Inicio/registrar.php');
    }
    
    // Recorro el fichero de autorizaciones
    
    

    // No autorizado
    header('location: login.php?error=LoginF');
}

/**
 * Comprueba que se está dentro de una sesión.
 * 
 * Si no se está se manda a la página de login.
 */
function sessionIn() {
    session_start();
    if (isset($_SESSION['usuario'])) {
        return;
    }
    if (isset($_POST['login']) && isset($_POST['password'])) {
        sessionLogin();
        return;
    }
    header('location: login.php?error=bug');
}

/**
 * Destruye la sesión
 */
function sessionDestroy() {
    session_start();
    setcookie(session_name(), '', time() - 86400, '/');
    session_destroy();
    unset($_SESSION);
}


?>