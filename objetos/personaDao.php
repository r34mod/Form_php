<?php 

    require_once('persona.php');
    require_once('../Inicio/conexion.php');

    class PersonaDao{
        const coma = ',';

        private $pdo;
        private $foto;


        function __construct($foto){
            $this->foto=$foto;
          
           
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

            /*
            try{
                $dsn = 'sqlite:'.$fichero;
                $this->pdo = new PDO($dsn);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            }catch(\PDOException $e){
                $e.getMessage();
            }
            */
        }

        private function crearTabla(){
            $sql = 'CREATE TABLA usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nombre TEXT NOT NULL,
                fecha TEXT NOT NULL,
                sexo TEXT NOT NULL,
                foto TEXT
            )';

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        
        function addUser($datosPers){
            $datosPers = $this->prepare($datosPers);

            $sql = 'INSERT INTO usuarios 
            (nombre, fecha, sexo, foto)
             VALUES (:nombre, :fecha, :sexo, :foto )';

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($datosPers);
           
        }
    


        function modUser($datosPers){
            $datosPers = $this->prepare($datosPers);


            $sql = 'UPDATE usuarios SET 
                    nombre=:nombre,
                    fecha=:fecha,
                    sexo=:sexo,
                    
                    foto=:foto
                WHERE id=:id';

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($datosPers);
        }


        private function prepare($datosPers){
            if(isset($datosPers['registro'])){
                $a['id']=$datosPers['registro'];
            }
            $a['nombre']=$datosPers['nombre'];
            $a['fecha']=$datosPers['fecha'];
            $a['sexo']=$datosPers['sexo'];
            //$a['deporte']= isset($datos['deportes']) ? implode(PersonaDao::coma, $datos['deporte']) : '';
            if(isset($datosPers['foto']['name'])){
                if($datosPers['foto']['name']){
                    move_uploaded_file($datosPers['foto']['tmp_name'], $this->fotos.'/'.$datosPers['foto']['name']);
                    $a['foto'] = $datosPers['foto']['name'];
                }else {
                    $a['foto']='';
                }
            }else {
                $a['foto']='';
            }
            return $a;
        }


        function delUser($id) {
            $sql = 'DELETE FROM usuarios WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
        }


        function leerTodo(){
            $todo = [];
            $sql = 'SELECT id, nombre, fecha, sexo, foto
                    FROM usuarios ORDER BY id';
            $stmt = $this->pdo->query($sql);
            while ($datosPers = $stmt->fetch()){
                $todo[] = $this->convertirDatos($datosPers);
            }
            return $todo;
        }


        function leerNombre($nombre){
            $sql = 'SELECT id, nombre, fecha, sexo, foto
                    FROM usuarios WHERE nombre = :nombre';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $datos = $stmt->fetch();
            return $this->convertirDatos($datosPers);
        }



        function convertirDatos($datos){
            $registrarUser = new Persona(
                $datosPers['id'],
                $datosPers['nombre'],
                $datosPers['fecha'],
                $datosPers['sexo'],
                
                $datosPers['foto']
            );
        }


    }

?>