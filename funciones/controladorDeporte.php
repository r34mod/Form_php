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

    $dao = new DeporteDao();

    if (!isset($_POST['accion'])) {
        $datosDep = $dao->readAll();
        return [$mensaje, $datosDep];
    }

    switch ($_POST['accion']) {
        case 'añadirDeporte':
            $datosDep = $_POST;
            

            $dao->addDeporte($datosDep);
            $datosDep = $dao->readTodoDeporte();
            $mensaje = 'Usuario añadido';
        break;
        case 'modificarDeporte':
            $datosDep = $_POST;
            

            $dao->modDeporte($datosDep);
            $datosDep = $dao->readAll();
            $mensaje = 'Usuario modificado';
        break;
        case 'eliminarDeporte':
            $dao->delDeporte($_POST['registro']);
            $datosDep = $dao->readAll();
            $mensaje = 'Usuario eliminado';
        break;
        case 'leerDeporte':
            $datosDep = $dao->readDeporte($_POST['registro']);
        break;
        default:
            $datosDep = $dao->readTodoDeporte();
    }
    return [$mensaje, $datosDep];
}


