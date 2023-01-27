<?php
require('../db.php');

$id_compra = $_GET['id_compra'];

$conexiondb = conectardb();

try {
    $query ="DELETE FROM compra WHERE id_compra=".$id_compra;

}finally{
    echo "<script>alert('Registros Actualizados');
window.location.href='./list_compra.php'</script>";
}

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Producto Eliminado');
    window.location.href='./list_compra.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./list_compra.php'</script>";
}
?>