<?php
include('../db.php');
$nombre =$_POST['nombre'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$conexion = conectardb();

$query = "INSERT into reserva (nombre, fecha_inicio, fecha_fin) VALUES
('$nombre', '$fecha_inicio','$fecha_fin')";

$respuesta = mysqli_query($conexion, $query);
if ($respuesta) {
  echo "<script>alert('Registro Exitoso');
                         window.location.href='registrar_reserva.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.href='registrar_reserva.php'</script>";
}
mysqli_close($conexiondb);

?>