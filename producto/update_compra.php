<?php
include ('../db.php');

$precio     = $_POST['precio'];
$cantidad   = $_POST['cantidad'];
$total_pagar    =($_POST['total_pagar'] = $precio * $cantidad);

$conexiondb = conectardb();

$id_compra = $_POST['id_compra'];
$query = "UPDATE compra SET precio='" . $precio . "', cantidad='" .$cantidad . "', total_pagar='" .$total_pagar . "' WHERE id_compra=" . $id_compra;

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Exitoso');
                            window.location.href='./list_compra.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
                            window.location.href='./list_compra.php'</script>";
}
mysqli_close($conexiondb);


?>