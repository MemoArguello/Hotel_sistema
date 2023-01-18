<?php
require('../db.php');

$id_producto = $_GET['id_caja'];

$conexiondb = conectardb();

$query ="DELETE FROM caja WHERE id_caja=".$id_producto;

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='../reportes_caja.php'</script>";
} else {
    echo "<script>alert('El Registro no se pudo Eliminar');
    window.location.href='../reportes_caja.php'</script>";
}
?>