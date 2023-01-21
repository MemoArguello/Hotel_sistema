<?php
include('../db.php');

$reserva =$_POST['id_reserva'];
$habitacion =$_POST['id_habitacion'];
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 
$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$conexiondb = conectardb();

$fechaInicialSegundos = strtotime($fecha_inicio);
$fechaFinalSegundos = strtotime($fecha_fin);
$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;

$precio = "SELECT precio FROM habitaciones WHERE id_habitaciones=" . $habitacion;
$resultado = mysqli_query($conexiondb, $precio);
$monto = mysqli_fetch_assoc($resultado);

$total_pagar = ($dias * $monto['precio']);

$query = "INSERT INTO recepcion (id_reserva, id_habitacion, fecha_inicio, fecha_fin, total_dias, total_pagar) VALUES
('$reserva','$habitacion', '$fecha_inicio', '$fecha_fin', '$dias','$total_pagar')";

$query2 = "UPDATE habitaciones SET estado='" .' ocupado' . "' WHERE id_habitaciones=" . $habitacion;

$query3 = "UPDATE caja SET ingreso= (ingreso +" . $total_pagar. ") WHERE estado= 'abierto'";

$respuesta2 = mysqli_query($conexiondb, $query2);
$respuesta = mysqli_query($conexiondb, $query);
$respuesta3 = mysqli_query($conexiondb, $query3);


if ($respuesta and $respuesta2 and $respuesta3) {
  echo "<script>alert('Registro Exitoso');
  window.location.   href='../calendario/index.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.   href='../calendario/index.php'</script>";
}
mysqli_close($conexiondb);
?>