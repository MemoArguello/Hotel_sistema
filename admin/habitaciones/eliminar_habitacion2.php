<?php
require('../../db.php');

$id_habitacion = $_GET['id_habitaciones'];

$conexiondb = conectardb();

try{$query ="DELETE FROM habitaciones WHERE id_habitaciones=".$id_habitacion;
}
finally{
    echo "<script>alert('Registros Actualizados');
          window.location.href='../listado/form_habitaciones2.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='../listado/form_habitaciones2.php'</script>";
} else {
    echo "<script>alert('No se elimino el registro');
    window.location.href='../listado/form_habitaciones2.php'</script>";
}
?>