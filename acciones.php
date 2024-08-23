<?php include('./src/config/db.php'); ?>

<?php 
    /** Verificar si se ha enviado el NIT */
    if(isset($_GET['NIT']) && isset($_GET['accion'])) {
        $nit = $mysqli->real_escape_string($_GET['NIT']);
        $accion = $_GET['accion']; /** Obtiene la accion */

        /** Determinar el estado segun la accion */
        $nuevoEstado = ($accion == 'activar') ? 1 : 0;

        /** Actualizar Estado Proveedor*/
        $query = "UPDATE Proveedor SET Activo = $nuevoEstado WHERE NIT = '$nit'";

        if($mysqli->query($query)) {
            /** Redireccionar */
            header("Location: index.php");
            exit();
        }else {
            echo "Error al cambiar el estado del proveedor: " . $mysqli->error;
        }
    }else {
        echo "Accion No Válida";
    }

    $mysqli->close();
?>