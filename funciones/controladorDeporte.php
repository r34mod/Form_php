<?php
/**
 * Controlador de la aplicación
 * 
 * Dada una acción llama al método que la ejecuta
 * 
 * @return string mensaje
 */
function appController() {
    $mensaje = '';

    $dao = new deporte(FIC_DATOS, DIR_FOTOS);

    if (!isset($_POST['accion'])) {
        $datos = $dao->readAll();
        return [$mensaje, $datos];
    }

    switch ($_POST['accion']) {
        case 'añadir':
            $datos = $_POST;
            $datos['foto'] = $_FILES['foto'];

            $dao->addDeporte($datos);
            $datos = $dao->readTodoDeporte();
            $mensaje = 'Usuario añadido';
        break;
        case 'modificar':
            $datos = $_POST;
            if ($_FILES['foto']['name']) {
                $datos['foto'] = $_FILES['foto'];
            }

            $dao->modDeporte($datos);
            $datos = $dao->readAll();
            $mensaje = 'Usuario modificado';
        break;
        case 'eliminar':
            $dao->delDeporte($_POST['registro']);
            $datos = $dao->readAll();
            $mensaje = 'Usuario eliminado';
        break;
        case 'leer':
            $datos = $dao->readDeporte($_POST['registro']);
        break;
        default:
            $datos = $dao->readTodoDeporte();
    }
    return [$mensaje, $datos];
}


/**
 * Devuelve un mensaje de error según la lista de errores
 */
function appError() {
    return isset($_GET['error']) && isset(LST_ERRORES[$_GET['error']]) ? LST_ERRORES[$_GET['error']] : '';
}

/**
 * Devuelve código para mostrar el usuario y botón de salir de la sesión
 * 
 * @return string code
 */
function appUser() {
    $mensaje = '';
    $usuario = $_SESSION['usuario'] ?? '';
    if ($usuario) {
        $mensaje =<<< EOT
            Usuario: $usuario
            <form action="login.php">
                <input type="submit" value="salir">
            </form>
EOT;
    }
    return $mensaje;
}
