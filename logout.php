<?php
    session_start(); // Iniciar la sesión

    // Destruir todas las variables de sesión
    $_SESSION = [];

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario al formulario de login
    header('Location: index.php');
    exit;
?>
