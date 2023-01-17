<?php
include('../db.php');

$reserva =$_POST['id_reserva'];
$habitacion =$_POST['id_habitacion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$conexiondb = conectardb();

$query = "INSERT INTO recepcion (id_reserva, id_habitacion, fecha_inicio, fecha_fin) VALUES
('$reserva','$habitacion', '$fecha_inicio', '$fecha_fin')";
$query2 = "UPDATE habitaciones SET estado='" .' ocupado' . "' WHERE id_habitaciones=" . $habitacion;
$respuesta2 = mysqli_query($conexiondb, $query2);
$respuesta = mysqli_query($conexiondb, $query);
if ($respuesta and $respuesta2) {
  echo "<script>alert('Registro Exitoso');
  window.location.   href='../calendario/index.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.   href='../calendario/index.php'</script>";
}
mysqli_close($conexiondb);
?>