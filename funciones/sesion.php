<?php
/**
 * Comprueba que el usuario y clave pasados corresponde
 * a alguno de los existentes en fichero de claves.
 * 
 * Si no se manda a la página de login.
 */

const COMA = ',';


function sessionLogin() { 
    // Viene del formulario de entrada
    $usuario = $_POST['login'] ?? '';
    $clave = $_POST['password'] ?? '';

    
    // Recorro el fichero de autorizaciones
    $passwd = file(FICHERO_PASSWORD);
    foreach ($passwd as $line) {
        if ($usuario.COMA.$clave == trim($line)) {
            // Autorizado
            $_SESSION['login'] = $usuario;
            return;
        }
    }

    // No autorizado
    header('location: login.php?error=login');
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
    if (isset($_POST['usuario']) && isset($_POST['clave'])) {
        sessionLogin();
        return;
    }
    header('location: login.php?error=login');
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