<?php include('./src/templates/header.php');?>
<?php include('./src/config/db.php') ?>

<div class="container">
    <h1>Nuevo Proveedor</h1>
    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            /** Sanitizacion de los datos recibidos del formulario */
            $nit = filter_input(INPUT_POST, 'nit', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);

            // Validaciones del lado del servidor
            $errores = [];
            if (empty($nit) || !preg_match('/^\d{8,12}$/', $nit)) {
                $errores[] = "El NIT debe tener entre 8 y 12 dígitos.";
            }
            if (empty($nombre) || !preg_match('/^[A-Za-z\s]{3,100}$/', $nombre)) {
                $errores[] = "El nombre debe tener al menos 3 letras y solo contener caracteres alfabéticos.";
            }
            if (empty($telefono) || !preg_match('/^\d{8}$/', $telefono)) {
                $errores[] = "El teléfono debe tener 8 dígitos.";
            }
            if (empty($direccion) || strlen($direccion) < 10) {
                $errores[] = "La dirección debe tener al menos 10 caracteres.";
            }

            if(empty($errores)) {
                // Consulta para insertar un nuevo proveedor
                $query = "INSERT INTO Proveedor (NIT, NombreCompleto, Telefono, Direccion, Activo ) VALUES (?, ?, ?, ?, 1)";

                if ($stmt = $mysqli->prepare($query)) {
                    $stmt->bind_param('ssss', $nit, $nombre, $telefono, $direccion);
        
                    if ($stmt->execute()) {
                        /** Redireccionar */
                        header('Location: index.php?message=Proveedor%20Creado%20Correctamente');
                        exit();
                    } else {
                        echo "<p class='error-message'>Error al agregar proveedor: " . $stmt->error . "</p>";
                    }
        
                    $stmt->close(); // Cerramos la consulta preparada
                } else {
                    echo "<p class='error-message'>Error al preparar la consulta: " . $mysqli->error . "</p>";
                }
            }else {
                /** Mostrar los ERRORES */
                echo "<div class='error-message'>";
                foreach ($errores as $error) {
                    echo "<p>$error</p>";
                }
                echo "</div>";
            }
            cerrarConexion($mysqli); // Cerramos la conexión
        }

    ?>
    

    <form id="proveedorForm" action="" method="POST">
        <div class="form-group">
            <label for="nit">NIT</label>
            <input type="text" id="nit" name="nit" required>
            <span id="nitError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
            <span id="nombreError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" required>
            <span id="telefonoError" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required>
            <span id="direccionError" class="error-message"></span>
        </div>
        <button type="submit" class="btn">Guardar Proveedor</button>
    </form>
</div>
<script src="./src/js/index.js"></script>
<?php include('./src/templates/footer.php'); ?>

