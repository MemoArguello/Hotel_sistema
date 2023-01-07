<?php
require('../../db.php');

$id_categoria = $_GET['id_categoria'];

$conexiondb = conectardb();

try{$query ="DELETE FROM categorias WHERE id_categoria=".$id_categoria;
}
finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='./listado_categoria2.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Categoria Eliminada');
    window.location.href='./listado_categoria2.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./categoria2.php'</script>";
}
?>