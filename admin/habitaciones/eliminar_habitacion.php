<?php
require('../../db.php');

if(isset($_GET['id_habitaciones'])){

$id_habitacion = $_GET['id_habitaciones'];

$conexiondb = conectardb();

try {
    $query ="DELETE FROM habitaciones WHERE id_habitaciones=".$id_habitacion;
}
finally{
    echo "<script>alert('Registros Actualizados');
window.location.href='../listado/form_habitaciones.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='../listado/form_habitaciones.php'</script>";
} else {
    echo "<script>alert('No se elimino el registro');
    window.location.href='../listado/form_habitaciones.php'</script>";
}
}else{
echo "<script>alert('No se elimino el registro');
window.location.href='../listado/form_habitaciones.php'</script>";
}

?>