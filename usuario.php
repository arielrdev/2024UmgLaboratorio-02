<?php include('./src/config/db.php'); ?>
<?php 
    $db = conectarDB();

    $commonname = "Administrador";
    $username = "admin";
    $password = "admin";

    /** Hash password */
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $query = " INSERT INTO userauth (commonname, username, pswd) VALUES ( '${commonname}', '${username}', '${passwordHash}') ";

    /** Agregar al Base de datos */
    mysqli_query($db, $query);
?>


