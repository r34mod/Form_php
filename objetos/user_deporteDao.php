<?php

    class user_deporte{



        function __construct(){
            $this->crearTablaUD();
        }

        private function connect(){
            $host = 'localhost';
            $dbUsername = 'root';
            $dbPassword = 'root';
            $dbname = 'datosUsuarios'; //nombre de la base de datos
            $charset='utf8mb4';

            try{
                $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ];
                try {
                    $pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
                } catch (\PDOException $e) {
                    echo $e->getMessage(); // En producción, se debería redirigir a una
                } // página de error
            }catch(\PDOException $e){
                echo $e->getMessage();
            }
        }

        /*
            Creamos una funcion para crear una tabla con las 'id' de deporte y usuario y creamos las 
            FOREIGN KEY
        */

        private function crearTablaUD(){
            $sql = 'CREATE TABLA user_deporte(
                id_user INTEGER NOT NULL,
                id_deporte INTEGER NOT NULL,

                FOREIGN KEY fk_id_user(id_user)
                REFERENCES usuarios(id),
                
                FOREIGN KEY fk_id_deporte(id_deporte)
                REFERENCES deporte(id_deporte)

                )';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        }
    }

?>