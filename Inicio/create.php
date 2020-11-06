<?php
require_once('connection.php');

if($conn){
    mysqli_select_db($conn, "datosUsuarios");
}

//CREO LA TABLA USUARIO Y CONTRASEÑA

    $sentencia3 = "CREATE TABLE usr_pwd (
            usuario VARCHAR(55) PRIMARY KEY, contra VARCHAR(255))";

        if ($conn->query($sentencia3) === TRUE)  {
            echo "conectado";
            $conn->query( "CREATE TABLE sport (
                id_deporte INTEGER AUTO_INCREMENT,
                deporte VARCHAR(20),
                PRIMARY KEY(id_deporte)
            )");
            $conn->query( "CREATE TABLE usuarios (
                id INTEGER AUTO_INCREMENT,
                nombre VARCHAR(30) NOT NULL,
                fecha DATE NOT NULL,
                sexo CHAR(1) NOT NULL,
                foto VARCHAR(200),
                PRIMARY KEY(id)
            )");

            $conn->query( "CREATE TABLE user_deporte(
                id_user INTEGER NOT NULL,
                id_sport INTEGER NOT NULL,

                FOREIGN KEY (id_user)
                REFERENCES usuarios(id),
                
                FOREIGN KEY (id_sport)
                REFERENCES sport(id_deporte)

                )");
        }else {
        echo " otra vez error";
        }

   



?>