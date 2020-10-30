<?php
    $conect = mysql_connect("localhost",'root','root');

    /*
        CREAMOS LA BASE DE DATOS 

    */

    $db = mysql_select_db("datosUsuarios");

    function createTablaPassword(){
        $sql = 'CREATE TABLA user_pwd (
            
            USUARIOS TEXT NOT NULL,
            PASSWORD TEXT NOT NULL,
            
        )';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    if(isset($db)){
        header("Inicio/login.php");
        
    }else{
        mysql_query("CREATE DATABASES datosUsuarios");
        createTablaPassword();
        echo "database creada";
        header("Inicio/login.php");
    }

    


?>