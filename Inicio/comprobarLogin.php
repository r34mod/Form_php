<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

try{
	$error = false; //Boolean para comprobar que no se ha conectado a la bbdd
	$login=htmlentities(addslashes($_POST["login"]));
	
	$password=htmlentities(addslashes($_POST["password"]));

	//$contador = 0;

	$host='localhost';
	$dbUsername='root';
	$dbPassword='root';
	$dbname = 'datosUsuarios';
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
		$error = true;
    }else{
		$sql="SELECT * FROM user_pdw WHERE USUARIOS= :login";
	
		$resultado=$pdo->prepare($sql);	
		
		$resultado->execute(array(":login"=>$login));
		
			while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
				
				//echo "Usuario: " . $registro['USUARIOS'] . " Contraseña: " . $registro['PASSWORD'] . "<br>";			
						
				if(password_verify($password, $registro['PASSWORD'])){
					//$contador++;
					header('location: ../Vistas/menuBotones.php');
				}else {
					header('location: registrar.php');
				}
			}
			
	}
	if($error==true ){
		$passwd = file(FICHERO_PASSWORD);
    		foreach ($passwd as $line) {
				if ($login.COMA.$password == trim($line)) {
					// Autorizado
					$_SESSION['login'] = $usuario;
					header('location: menuBotones.php');
				return;
				}
			}
		}
	
	
	
	
		
							
		
		
		$resultado->closeCursor();

	
	
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}




?>
</body>
</html>