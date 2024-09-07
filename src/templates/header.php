<?php 
        session_start(); // Iniciar la sesión

        // Verificar si el usuario está autenticado
        $auth = $_SESSION['login'] ?? false;
        $username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Proveedores</title>
    <link rel="stylesheet" href="src/css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="brand">Proveedores</a>
            <ul class="nav-links">
                <li class="btn-nav"><a href="index.php">Inicio</a></li>
                <li class="btn-nav"><a href="lista-proveedores.php">Desactivar Proveedores</a></li>
                <li class="btn-nav"><a href="formulario.php">Crear Proveedor</a></li>
                <?php if($auth): ?>
                    <li class="user-info">Usuario: <?php echo htmlspecialchars($username); ?></li>
                    <li class="btn-nav--logout"><a class="btn-logout" href="logout.php">Cerrar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!--Toast-->
    <div id="toast" class="toast"></div>
    <script src="src/js/toast.js"></script>
