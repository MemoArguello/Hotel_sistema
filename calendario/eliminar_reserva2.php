<?php
require('../db.php');

$id = $_GET['id'];

$conexiondb = conectardb();

try{
    $query ="DELETE FROM reserva WHERE id=".$id;
}
finally{
    echo "<script>alert('Registros Actualizados');
          window.location.href='./listado_reserva2.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Usuario Eliminado');
    window.location.href='./listado_reserva2.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_reserva2.php'</script>";
}
?>