<?php
include ('../db.php');

$producto    = $_POST['id_producto'];
$recepcion   = $_POST['id_recepcion'];
$precio   = $_POST['precio'];
$cantidad   = $_POST['cantidad'];
$total_pagar    =($_POST['total_pagar'] = $precio * $cantidad);

$conexiondb = conectardb();

$id_venta = $_POST['id_venta'];
$query = "UPDATE venta SET id_producto='" . $producto . "', id_cliente='" .$recepcion . "', precio='" .$precio . "', cantidad='" .$cantidad . "', total_pagar='" .$total_pagar . "' WHERE id_venta=" . $id_venta;

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Exitoso');
                            window.location.href='./listado_ventas2.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
                            window.location.href='./listado_ventas2.php'</script>";
}
mysqli_close($conexiondb);


?>