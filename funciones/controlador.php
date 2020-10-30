<?php

    function controladorAplicacion(){

        $mensaje = '';
        $dao = new PersonaDao(FIC_DATOS, RUTA_FOTOS);

        if(!isset($_POST['accion'])){
            $datos = $dao->leerTodo();
            return [$mensaje, $datos];
        }




        switch($_POST['accion']){
            case 'agregar':
                $datos = $_POST;
                $datos['foto']= $_FILES['foto'];
                $dao->addUser($datos);

                $datos = $dao->leerTodo();

                $mensaje = 'Usuario agregado';
            break;

            case 'modificar':
                $datos = $_POST;
                if ($_FILES['foto']['name']) {
                    $datos['foto'] = $_FILES['foto'];
                }
    
                $dao->modUser($datos);
                $datos = $dao->readTodo();
                $mensaje = 'Usuario modificado satisfactoriamente';
            break;
            case 'eliminar':
                $dao->delUser($_POST['registro']);
                $datos = $dao->readAll();
                $mensaje = 'Usuario eliminado satisfactoriamente';
            break;
            case 'leer':
                $datos = $dao->read($_POST['registro']);
            break;
            default:
                $datos = $dao->readAll();
        }
    }

?>