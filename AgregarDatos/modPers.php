<?php
    require_once('../objetos/persona.php');
    require_once('../objetos/personaDao.php');
    require_once('../funciones/funcionForm.php');
    require_once('../funciones/controlador.php');
    require_once('../funciones/config.php');
?>



<h1>Modificar</h1>
<form action="../Vistas/listaPersona.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="modificar">

    <label>Nombre: <input type="text" name="nombre" size="30" value="<?= $datosPers->getNombre() ?>" required></label>
    <label>Nacido: <input type="date" name="nacido" value="<?= $datosPers->getNacido() ?>" required></label>
    <label>Sexo: <?= inputRadio('sexo', Persona::listaSexo, $datosPers->getSexo(), 'required') ?></label>
   
    <label>Foto:
        <?php
            if ($datos->getFoto()) {
                printf('<img src="%s/%s">', RUTA_FOTO, $datos->getFoto());
                printf('<input type="hidden" name="foto" value="%s">', $datos->getFoto());
            }
        ?>
        <input type="file" name="foto">
    </label>
    <br>
    <input type="submit" value="modificar">
</form>

<form action="../Vistas/listaPersona.php" method="post">
    <input type="hidden" name="accion" value="eliminar">
    <input type="hidden" name="registro" value="<?= $_POST['registro'] ?>">
    <input type="submit" value="eliminar">
</form>
<form action="../Vistas/listaPersona.php" method="get">
    <input type="submit" value="volver">
</form>

</html>


