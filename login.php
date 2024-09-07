<?php include('./src/templates/header.php');?>
<?php include('./src/config/db.php') ?>
<?php 
    $db = conectarDB();

    /** Autenticar Usuario */
    $errores = [];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$username) {
            $errores[] = "El usuario es obligatorio o no es válido";
        }

        if(!$password) {
            $errores[] = "El Password es obligatorio";
        }

        if(empty($errores)) {
            /** Revisar si el usuario existe. */
            $query = " SELECT * FROM userauth WHERE username = '${username}' ";
            $resultado = mysqli_query($db, $query);
            var_dump($resultado);

            if($resultado->num_rows) {
                /** Revisar si el password es correcto */
                $usuario = mysqli_fetch_assoc($resultado);
                
                /** Verificar si el password es correcto o no */
        
                $auth = password_verify($password, $usuario['pswd']);
                
                if($auth) {
                    /** El usuario esta autenticado */
                    
                }else{
                    /** Password Incorrecto */
                    $errores[] = 'El Password es incorrecto';
                }
            } else {
                $errores[] = "El usuario no existe.";
            }
        }

    }
?>

<div class="container">
    <h1>Iniciar Sessión</h1>
    <?php foreach($errores as $error): ?>
        <div class="error-message">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form id="proveedorForm" method="POST" novalidate>
        <div class="form-group contenido-centrado">
            <legend>Usuario y Password</legend>
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
    
        <button type="submit" class="btn">Iniciar Sessión</button>
    </form>
</div>
<script src="./src/js/index.js"></script>
<?php include('./src/templates/footer.php'); ?>

