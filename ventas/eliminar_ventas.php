<?php
require('../db.php');

$id_venta = $_GET['id_venta'];

$conexiondb = conectardb();

$query ="DELETE FROM venta WHERE id_venta=".$id_venta;

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Venta Eliminado');
    window.location.href='./listado_ventas.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_ventas.php'</script>";
}
?>