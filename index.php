<?php include('./src/templates/header.php');
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
            <tr>
                <td>1234567</td>
                <td>Proveedor 1</td>
                <td>5555-5555</td>
                <td>Dirección 1</td>
                <td>Activo</td>
            </tr>
            <!-- Aquí irán más filas de ejemplo -->
        </tbody>
    </table>
</div>

<?php include('./src/templates/footer.php'); ?>
