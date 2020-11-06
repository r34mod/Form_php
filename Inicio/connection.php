<?php


$conn = new mysqli("localhost","root","root");
if($conn -> connect_error){
  die("Conexion fallida: " . $conn-> connect_error);
}

$sql = "CREATE DATABASE datosUsuarios";

if(($conn->query($sql) === true)){
  echo "BBDD creada correctamente";
}else{
  die("Error al crear bbdd " . $conn->error);
}
echo "Database created";
if(!$conn){
  echo "Conexion fallida";
}else{
    echo "Conexion creada";
}


?>