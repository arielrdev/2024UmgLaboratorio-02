<?php include('./src/templates/header.php'); ?>
<?php include('./src/config/db.php'); ?>
<?php 
    $db = conectarDB();
?>

<div class="container">
    <h1>Listado de Proveedores</h1>
    <table class="tabla-proveedores">
        <thead>
            <tr>
                <th>NIT</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Consulta para obtener los proveedores
            $query = "SELECT NIT, NombreCompleto, Telefono, Direccion, Activo FROM Proveedor WHERE Activo = 1";
            $result = $db->query($query);

            if ($result) {
                // Verifica si hay filas en el resultado
                if ($result->num_rows > 0) {
                    // Recorre cada fila del resultado
                    while ($row = $result->fetch_assoc()) {
                        $estado = ($row['Activo'] ==1) ? 'Activo' : 'Inactivo';
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['NIT']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['NombreCompleto']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Telefono']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Direccion']) . "</td>";
                        echo "<td>" . $estado . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay proveedores activos.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Error en la consulta: " . $db->error . "</td></tr>";
            }

            // Cierra la conexión a la base de datos
            $db->close();
        ?>
        </tbody>
    </table>
</div>

<?php include('./src/templates/footer.php'); ?>
