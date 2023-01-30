<?php
include "../db.php";

$id_producto    = $_POST['id_producto'];
$producto       = $_POST['producto'];
$proveedor      = $_POST['id_proveedor'];
$precio         = $_POST['precio'];
$cantidad       = $_POST['cantidad'];
$usuario     = $_POST['id_usuario'];
$total_pagar    = ($_POST['total_pagar'] = $precio * $cantidad);


$conexiondb = conectardb();

$query = "INSERT INTO compra (producto,id_proveedor,precio,cantidad,total_pagar) VALUES
            ('$producto', '$proveedor', '$precio', '$cantidad','$total_pagar')";

$query2 = "UPDATE caja SET egreso= (egreso +" . $total_pagar. ") WHERE estado= 'abierto'";

$query3 = "UPDATE producto SET stock_inicial= (stock_inicial +" . $cantidad . ") WHERE id_producto=" . $id_producto;

$query4 = "INSERT INTO auditoria (id_usuario, evento, fecha) VALUES
('$usuario','Compra de Productos',now())";

$respuesta = mysqli_query($conexiondb, $query);
$respuesta2 = mysqli_query($conexiondb, $query2);
$respuesta3 = mysqli_query($conexiondb, $query3);
$respuesta4 = mysqli_query($conexiondb, $query4);

        if ($respuesta and $respuesta2 and $respuesta3 and $respuesta4) {
            echo "<script>alert('Registro Exitoso');
                    window.location.href='listado_productos.php'</script>";
        } else {
             echo "<script>alert('Registro Fallido');
              window.location.href='listado_productos.php'</script>";
        }
        mysqli_close($conexiondb);
?>