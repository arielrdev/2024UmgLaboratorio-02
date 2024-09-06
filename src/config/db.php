<?php
function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'desarrollo_web', 'desarrollo', 'desarrollo_web');

    if(!$db) {
        echo "Error al momento de conectarse a la base de datos";
        exit;
    }

    return $db;
}