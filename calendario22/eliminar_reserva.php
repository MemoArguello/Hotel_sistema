<?php
require('../db.php');

$id = $_GET['id_reserva'];

$conexiondb = conectardb();

try{
    $query ="DELETE FROM recepcion WHERE id_reserva=".$id;
}
finally{
    echo "<script>alert('Registros Actualizados');
          window.location.href='./index.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Usuario Eliminado');
    window.location.href='./listado_reserva.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_reserva.php'</script>";
}
?>