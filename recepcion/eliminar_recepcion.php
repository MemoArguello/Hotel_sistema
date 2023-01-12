<?php
include ('../db.php');

$id_recepcion = $_GET['id_recepcion'];

$conexiondb = conectardb();

$query = ("DELETE FROM recepcion WHERE id_recepcion =" . $id_recepcion);

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta){
    echo "<script>alert('Registro Eliminado');
            window.location.href='./listado_recepcion.php'</script>";
}else{
    echo "<script>alert('Registro no Eliminado');
    window.location.href='./listado_recepcion.php'</script>";
}




?>