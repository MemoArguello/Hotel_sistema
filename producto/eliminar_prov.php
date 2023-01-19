<?php
    include "../db.php";

    $id_proveedor = $_GET['id_proveedor'];

    $conexiondb = conectardb();

    $query = "DELETE FROM proveedores WHERE id_proveedor=" . $id_proveedor;

    $respuesta = (mysqli_query($conexiondb, $query));

    if($respuesta) {  
    echo "<script>alert('Proveedor Eliminado');
    window.location.href='./proveedores.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./proveedores.php'</script>";
}
?>