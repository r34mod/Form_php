<?php
        sessionIn();
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

                foreach($fichero as $indice => $datosDep){
                    $numero = $indice +1;
                    $seleccion=<<<EOT
                        <form action="" method="POST">
                            <input type="hidden" name="accion" value="leer">
                            <input type="hidden" name="registro" value="{$datosDep->getId()}">
                            <input type="submit" value="$numero">
                        </form>
                    EOT;


                    printf(
                        '<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s',
                        $seleccion,
                        $datosDep->getListaDeportes(),
                        
                    );
                }
            ?>
        </table>
        <br><br>
        <form action="" method="POST">
                <input type="submit" value="agregar">
        </form>
    </body>

</html>