<?php include('./src/templates/header.php');
?>
<div class="container">
    <h1>Nuevo Proveedor</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" id="nit" name="nit" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <button type="submit" class="btn">Guardar Proveedor</button>
    </form>
</div>

<?php include('./src/templates/footer.php'); ?>

