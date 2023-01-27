<?php
include '../db.php';

$producto       =$_POST['id_producto'];
$cliente        =$_POST['id_cliente'];
$precio         =$_POST['precio'];
$cantidad       =$_POST['cantidad'];
$total_pagar    =($_POST['total_pagar'] = $precio * $cantidad);


$conexion = conectardb();


$query = "INSERT INTO venta (id_producto, id_cliente, precio, cantidad, total_pagar) VALUES
('$producto','$cliente','$precio','$cantidad','$total_pagar')";

$query2 = "UPDATE caja SET ingreso= (ingreso +" . $total_pagar. ") WHERE estado= 'abierto'";

$query3 = "UPDATE producto SET stock_inicial= (stock_inicial -" . $cantidad . ") WHERE id_producto=" . $producto;

$respuesta = mysqli_query($conexion, $query);
$respuesta2 = mysqli_query($conexion, $query2);
$respuesta3 = mysqli_query($conexion, $query3);


if ($respuesta and $respuesta2 and $respuesta3) {
    echo "<script>alert('Registro Exitoso');
                           window.location.href='./ventas2.php'</script>";
  } else {
    echo "<script>alert('Registro Fallido');
                            window.location.href='./ventas2.php'</script>";
  }
  mysqli_close($conexiondb);
?>