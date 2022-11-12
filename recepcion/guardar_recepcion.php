<?php
include('../db.php');

$reserva =$_POST['id_reserva'];
$habitacion =$_POST['id_habitacion'];

$conexion = conectardb();

$query = "INSERT INTO recepcion (id_reserva, id_habitacion) VALUES
('$reserva','$habitacion')";


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