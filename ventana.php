<?php
    sessionIn();

?>


<!DOCTYPE html>

<head>
    <title>Ventana de datos</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Listado de datos</h1>
    <table>
        <thread>
            <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha</th>
                <th>Sexo</th>
                <th>Deportes</th>
                <th>Foto</th>
            </tr>
        </thread>


        <?php
            foreach($fichero as $indice => $datos){
                $numero = $indice+1;
                $seleccion =<<< EOT
                    <form action="" method="POST">
                        <input type="hidden" name="accion" value="leer">
                        <input type="hidden" name="registro" value="{$datos->getId()}"> <!--ID del usuario-->
                        <input type="submit" value="$numero">
                    </form>
                EOT;


                printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                $seleccion,
                $datos->getNombre(),
                $datos->getApellidos(),
                formatDate($datos->getFecha()),
                $datos->getFoto();
            }

        ?>
    </table>
</body>
</html>


