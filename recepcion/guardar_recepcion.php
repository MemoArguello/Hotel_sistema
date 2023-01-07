<?php
include('../db.php');

$reserva =$_POST['id_reserva'];
$habitacion =$_POST['id_habitacion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$conexion = conectardb();

$query = "INSERT INTO recepcion (id_reserva, id_habitacion, fecha_inicio, fecha_fin) VALUES
('$reserva','$habitacion', '$fecha_inicio', '$fecha_fin')";


$respuesta = mysqli_query($conexion, $query);
if ($respuesta) {
  echo "<script>alert('Registro Exitoso');
                         window.location.href='../calendario/index.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.href='../calendario/index.php'</script>";
}
mysqli_close($conexiondb);
?>