<?php




//dao buscarlo

//generar varias clases para el proyecto

//blob para archivos en sqli
/*
$fichero = fichero.open();


base64_encode
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
$personma1 = new Persona();
$username = $_POST['username'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];

if(!empty($username) || !empty($password) || !empty($genero) || !empty($email) 
|| !empty($phoneCode) || !empty($phone)){
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbname = 'Indio'; //nombre de la base de datos
    $charset='utf8mb4';

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
    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_errno());
    }else {

        $query = 'INSERT INTO Indio (username, apellido, genero, email, phoneCode, phone) VALUES (?,?,?,?,?,?)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $apellido, $genero, $email, $phoneCode, $phone]);
       //$persona1->getName()
    }
} else {
    echo "Todo agregado";
    die();
}
?>