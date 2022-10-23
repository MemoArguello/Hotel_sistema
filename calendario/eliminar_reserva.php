<?php
require('../db.php');

$id = $_GET['id'];

$conexiondb = conectardb();

$query ="DELETE FROM reserva WHERE id=".$id;

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Usuario Eliminado');
    window.location.href='./listado_reserva.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_reserva.php'</script>";
}
?>