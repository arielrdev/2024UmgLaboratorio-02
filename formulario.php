<?php include('./src/templates/header.php');?>
<?php include('./src/config/db.php') ?>

<div class="container">
    <h1>Nuevo Proveedor</h1>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nit = $_POST['nit'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
    
            // Consulta para insertar un nuevo proveedor
            $query = "INSERT INTO Proveedor (NIT, NombreCompleto, Telefono, Direccion, Activo ) VALUES (?, ?, ?, ?, 1)";
            
            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param('ssss', $nit, $nombre, $telefono, $direccion);
    
                if ($stmt->execute()) {
                    echo "<p>Proveedor agregado exitosamente.</p>";
                } else {
                    echo "<p>Error al agregar proveedor: " . $stmt->error . "</p>";
                }
    
                $stmt->close(); // Cerramos la consulta preparada
            } else {
                echo "<p>Error al preparar la consulta: " . $mysqli->error . "</p>";
            }
            
            cerrarConexion($mysqli); // Cerramos la conexión
        }

    ?>
    <form action="" method="POST">
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

