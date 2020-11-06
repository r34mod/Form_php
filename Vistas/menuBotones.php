<?php
    

?>
<!DOCTYPE html> 
    <head>
        <title>Menu de la pagina</title>
        <meta charset="utf-8">
    </head>
    <body>

        <h1>Inicio</h1>

        <form action="listaPersona.php">
            <input type="submit" name="Personas" value="Persona">
        </form>
        <br><br>
        <form action="listaDeporte.php">
            <input type="submit" name="Deportes" value="Deporte">
        </form>

    </body>
    <?php
		include_once('../headFoot/footer.php');
	?>
</html>