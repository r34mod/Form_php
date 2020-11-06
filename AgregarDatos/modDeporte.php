<?php
    require_once('../objetos/deporte.php');
    require_once('../objetos/deporteDao.php');
    require_once('../funciones/funcionForm.php');
    require_once('../funciones/controladorDeporte.php');
    require_once('../funciones/config.php');
?>



<h1>Modificar</h1>
<form action="../Vistas/listaDeporte.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="modificarDeporte">

    <label>Deportes: <?= inputCheckbox('deporte[]', Deporte::listaDeportes, $datosDep->getDeportes()) ?></label>
    <br>
    <input type="submit" value="modificarDeporte">
</form>

<form action="../Vistas/listaDeporte.php" method="post">
    <input type="hidden" name="accion" value="eliminarDeporte">
    <input type="hidden" name="registro" value="<?= $_POST['registro'] ?>">
    <input type="submit" value="eliminar">
</form>
<form action="../Vistas/listaDeporte.php" method="get">
    <input type="submit" value="volver">
</form>

</html>