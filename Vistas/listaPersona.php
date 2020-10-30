<?php

        sessionIn();

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
                foreach($fichero as $indice => $datosPers){
                    $numero = $indice + 1;
                    $seleccion = <<< EOT
                        <form action="" method="POST">
                            <input type="hidden" name="accion" value="leer">
                            <input type="hidden" name="registro" value="{$datosPers->getId()}">
                            <input type="submit" name="enviar>
                        </form>
                    EOT;
                    
                    printf(
                        '<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s<tr><td>%s',
                        $seleccion,
                        $datosPers->getNombre(),
                        formatDate($datosPers->getFecha()),
                        $datosPers->getListaSexo(),
                        $datosPers->getFoto() ? '<img src="'.RUTA_FOTO.'/'.$datosPers->getFoto().'">' : ''

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