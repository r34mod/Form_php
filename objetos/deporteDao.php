<?php 

    require_once('deporte.php');

class DeporteDao{

    const coma = ',';

    private $pdo;
    
    function __construct(){
            
        
    }


    private function connect(){
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'root';
        $dbname = 'datosUsuarios'; //nombre de la base de datos
        $charset='utf8mb4';

        //$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    
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



     function crearTablaDeporte(){
        $sql = 'CREATE TABLA deporte (
            id_deporte INTEGER PRIMARY KEY AUTOINCREMENT,
            deporte TEXT
        )';


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }


    private function prepare($datosDep){
        if(isset($datosDep['registro'])){
            $a['id_deporte']=$datosDep['registro'];
        }
        
        $a['deporte']=isset($datosDep['deporte']) ? implode(DeporteDao::coma, $datosDep['deporte']) : '';
        


        return $a;
    }




    function addDeporte($datosDep){
        $datosDep = $this->prepare($datosDep);
        $sql = 'INSERT INTO sport 
        (id_deporte, deporte)
         VALUES (:deporte)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datosDep);
    }


    function modDeporte($datosDep){
        $datosDep = $this->prepare($datosDep);


        $sql = 'UPDATE sport SET 
               deporte = :deporte
            WHERE id_deporte=:id_deporte';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($datosDep);
    }


    function delDeporte($id) {
        $sql = 'DELETE FROM sport WHERE id_deporte = :id_deporte';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    function leerTodoDeporte(){
        $todo = [];
        $sql = 'SELECT id_deporte, deporte FROM sport ORDER BY id_deporte';

        $stmt = $this->pdo->query($sql);
        while($datosDep = $stmt->fetch()){
            $todo[] = $this->convertirDatosDeporte($datosDep);
        }

        return $todo;
    }


    function readDepoorte($id) {
        $sql = 'SELECT id_deporte, deporte
                FROM sport
                WHERE id_deporte = :id_deporte';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $datosDep = $stmt->fetch();
        return $this->convertRecord($datosDep);
    }


    function convertirDatosDeporte($datosDep){
        $registrarDeporte = new Deporte(
            $datosDep['id_deporte'],
            explode(DeporteDao::coma, $datosDep['deporte'])
        );

        
    }

}

?>


