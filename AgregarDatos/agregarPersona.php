<?php
    require_once('../objetos/persona.php');
    require_once('../objetos/personaDao.php');
    require_once('../funciones/funcionForm.php');
    require_once('../funciones/controlador.php');
    require_once('../funciones/config.php');
?>



<h1>Añadir Persona</h1>
<form action="../Vistas/listaPersona.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="agregar">

    <label>Nombre: <input type="text" name="nombre" size="30" required></label>
    <label>Nacido: <input type="date" name="nacido" required></label>
    <label>Sexo: <?= inputRadio('sexo', Persona::listaSexo, '', 'required') ?></label>
    <label>Foto: <input type="file" name="foto"></label>
    <br>
    <input type="submit" value="guardar">
</form>
<form action="../Vistas/listaPersona.php" method="get">
    <input type="submit" value="volver">
</form>


</html>