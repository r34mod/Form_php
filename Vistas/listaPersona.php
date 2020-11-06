<?php

        require_once('../Inicio/conexion.php');
        require_once('../Inicio/session.php');
        require_once('../funciones/controlador.php');
        //sessionIn();
        include_once('../headFoot/header.php');

?>


<!DOCTYPE html>
    <head>
        <title>Lista de personas</title>
        <meta charset = "utf-8">
    </head>
    <body>
        <h1>Tabla de usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Sexo</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <?php
                $conn = mysqli_connect("localhost",'root','root',"datosUsuarios");
                if(!$conn){
                    echo "Conexion mal";
                }else{
                    $sql = "SELECT * FROM usuario";
                    $result = mysqli_query($conn, $sql);

                    if(!empty($result) AND mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){ 
                            echo "<tr><td". $row["id"] ."</td><td>". $row["nombre"] ."</td><td>". $row["fecha"]
                             ."</td><td>". $row["sexo"] ."</td><td>";
                             
                            
                             
                            
                        }
                        echo "</table>";
                    }else{
                        echo "0 result";
                    }
                    
                }
                
            
                ?>
            
        </table>
        <br><br>
        <form action="../AgregarDatos/agregarPersona.php" method="POST">
                <input type="submit" value="agregar">
        </form>
        <form action="../AgregarDatos/modPers.php" method="POST">
                <input type="submit" value="modificar">
        </form>
    </body>


    <?php
		include_once('../headFoot/footer.php');
	?>
</html>