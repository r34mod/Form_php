<h1>Añadir Deporte</h1>
<form action="listaDeporte.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="añadir">

    
    <label>Deportes: <?= inputCheckbox('deporte[]', Deporte::listaDeporte) ?></label>
    
    <br>
    <input type="submit" value="guardar">
</form>
<form action="listaDeporte.php" method="get">
    <input type="submit" value="volver">
</form>