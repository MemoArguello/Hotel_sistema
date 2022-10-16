<?php
require('../db.php');

$id_usuario = $_GET['id_usuario'];

$conexiondb = conectardb();

$query ="DELETE FROM usuarios WHERE id_usuario=".$id_usuario;

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Usuario Eliminado');
    window.location.href='./listado/form_cuentas.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado/form_cuentas.php'</script>";
}
?>