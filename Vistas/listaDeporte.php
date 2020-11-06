<?php

        //require_once('../Inicio/connection.php');
        require_once('../funciones/sesion.php');
        //sessionIn();
        include_once('../headFoot/header.php');
?>
<!DOCTYPE html>
    <head>
        <title>Lista de deportes</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Tabla de deportes</h1>
        <table>
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Deporte</th>
                    
                </tr>
            </thead>


            <?php
                $conn = mysqli_connect("localhost",'root','root',"datosUsuarios");
                if(!$conn){
                    echo "Conexion mal";
                }else{
                    $sql = "SELECT * FROM deporte";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr><td". $row["id_deporte"] ."</td><td>". $row["deporte"] ."</td><td>";
                            
                        }
                        echo "</table>";
                    }else{
                        echo "0 result";
                    }
                }
                

            ?>
        </table>
        <br><br>
        <form action="../AgregarDatos/agregarDeporte.php" method="POST">
                <input type="submit" value="agregar">
        </form>
        <form action="../AgregarDatos/modDeporte.php" method="POST">
                <input type="submit" value="Modificar">
        </form>
        
    </body>

    <?php
		include_once('../headFoot/footer.php');
	?>

</html>