<?php

    function controladorAplicacion(){

        $mensaje = '';
        $dao = new PersonaDao(RUTA_FOTOS);

        if(!isset($_POST['accion'])){
            $datos = $dao->leerTodo();
            return [$mensaje, $datos];
        }




        switch($_POST['accion']){
            case 'agregar':
                $datos = $_POST;
                $datos['foto']= $_FILES['foto'];
                $dao->addUser($datosPers);

                $datos = $dao->leerTodo();

                $mensaje = 'Usuario agregado';
            break;

            case 'modificar':
                $datos = $_POST;
                if ($_FILES['foto']['name']) {
                    $datos['foto'] = $_FILES['foto'];
                }
    
                $dao->modUser($datosPers);
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
    /*
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
        function appUsuario() {


            $mensaje = '';

            $conn = mysqli_connect("localhost",'root','root',"datosUsuarios");

                $sql = "SELECT usuario, contra FROM usr_pwd WHERE usuario='$nombre'
                AND contra='$pwd_cifrada'";
        
                $resultado = mysqli_query($conn, $sql);

                if(mysqli_num_rows($resultado) > 0){
                    while($row = mysqli_fetch_array($resultado)){
                        $usuario = $row["usuario"];
                        $clave = $row["contra"];
                        $_SESSION['usuario']=$usuario;

                        $user = $_SESSION['usuario'] ?? '';
                        if($user){
                            $mensaje=<<<EOT
                                Usuario: $user

                                <form action="../Inicio/login.php">
                                    <input type="submit" value="exit">
                                </form>
                            EOT;
                        }
                        return;
                    }

                }
            
            
        }

?>