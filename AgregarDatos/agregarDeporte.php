<?php
    require_once('../objetos/deporte.php');
    require_once('../objetos/deporteDao.php');
    require_once('../funciones/funcionForm.php');
    require_once('../funciones/controladorDeporte.php');
    require_once('../funciones/config.php');
?>

<h1>Añadir Deporte</h1>
<form action="../Vistas/listaDeporte.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="añadirDeporte">
    <label>Deportes: <?= inputCheckbox('deporte[]', Deporte::listaDeportes) ?></label>
    <br>
    <input type="submit" value="guardar">
</form>
<form action="../Vistas/listaDeporte.php" method="get">
    <input type="submit" value="volver">
</form>