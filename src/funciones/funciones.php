<?php
    function estaAutenticado() : bool {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['login'] ?? false;
    }

    function protegerRuta() {
        if (!estaAutenticado()) {
            $url = $_SERVER['REQUEST_URI']; // Obtiene la URL actual
            header("Location: login.php?redirect_to=" . urlencode($url));
            exit();
        }
    }
    
?>