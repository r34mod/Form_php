<?php 

    require_once('deporte.php');

class DeporteDao{

    const coma = ',';

    private $pdo;
    
    function __construct($fichero){
        if(file_exists($fichero)){
            $this->connect($fichero);
        }else {
            $this->connect($fichero);
            $this->crearTablaDeporte();
        }
    }


    private function connect(){
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'root';
        $dbname = 'datosUsuarios'; //nombre de la base de datos
        $charset='utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    
        try{
            $dsn = 'sqlite:'.$fichero;
            $this->pdo=new PDO($dsn);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE);
        }catch(\PDOException $e){
            $e.getMessage();
        }
    }



    private function crearTablaDeporte(){
        $sql = 'CREATE TABLA deporte (
            id_deporte INTEGER PRIMARY KEY AUTOINCREMENT,
            deporte TEXT
        )';


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    private function prepare($datosDep){
        if(isset($datosDep['registro'])){
            $a['id']=$datosDep['registro'];
        }
        
        $a['deporte']=isset($datosDep['deporte']) ? implode(DeporteDao::coma, $datosDep['deporte']) : '';
        


        return $a;
    }




    function addDeporte($datosDep){
        $datosDep = $this->prepare($datosDep);
        $sql = 'INSERT INTO deportes 
        (deporte)
         VALUES (:deporte)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datosDep);
    }


    function modDeporte($datosDep){
        $datosDep = $this->prepare($datosDep);


        $sql = 'UPDATE deporte SET 
               deporte = :deporte
            WHERE id=:id';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datosDep);
    }


    function delDeporte($id) {
        $sql = 'DELETE FROM deporte WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    function leerTodoDeporte(){
        $todo = [];
        $sql = 'SELECT id, deporte FROM deporte ORDER BY id';

        $stmt = $this->pdo->query($sql);
        while($datosDep = $stmt->fetch()){
            $todo[] = $this->convertirDatosDeporte($datosDep);
        }

        return $todo;
    }


    function readDepoorte($id) {
        $sql = 'SELECT id, deporte
                FROM deporte
                WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $datosDep = $stmt->fetch();
        return $this->convertRecord($datosDep);
    }


    function convertirDatosDeporte($datosDep){
        $registrarDeporte = new Deporte(
            $datosDep['id'],
            explode(DeporteDao::coma, $datosDep['deporte'])
        );

        
    }

}

?>


