<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

/*
	hola
	ijhwbeifb12jnfejfnwenflwenfo

	hola 

*/
	$usuario= $_POST["usu"];
	$contrasenia= $_POST["contra"];
	
	$cifrado = password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
				
	try{
			//$pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
			$pdo = new PDO('mysql:host=localhost; dbname=datosUsuarios', 'root', 'root');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$pdo->exec("SET CHARACTER SET utf8");
			$sql = "INSERT INTO user_pwd (USUARIOS, PASSWORD) VALUES (:usu, :contra)";
			$stmt = $pdo->query($sql);

			$stmt->execute(array(":usu"=>$usuario, ":contra"=>$cifrado));

			echo "Registro insertado";

			header('login.php');

			$stmt->closeCursor();
		}catch(Exception $e){
				echo "Linea de error: ".$e->getLine();
		}finally{
			$base=null;
		}

		//$base=new PDO('mysql:host=localhost; dbname=datosUsuarios', 'root', 'root');
		
		//$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		//$base->exec("SET CHARACTER SET utf8");		
				

?>
</body>
</html>