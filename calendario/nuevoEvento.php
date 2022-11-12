<?php
include('../db.php');
$cedula =$_POST['cedula'];
$nombre =$_POST['nombre'];
$telefono =$_POST['telefono'];
$procedencia = $_POST['procedencia'];
$factura = $_POST['factura'];
$cant_persona = $_POST['cant_personas'];
$pago = $_POST['pago'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$conexion = conectardb();

$query = "INSERT into reserva(cedula, nombre, telefono, procedencia, factura, cant_personas, pago, fecha_inicio, fecha_fin) VALUES
('$cedula','$nombre','$telefono','$procedencia','$factura', '$cant_persona','$pago', '$fecha_inicio','$fecha_fin')";

$respuesta = mysqli_query($conexion, $query);
if ($respuesta) {
  echo "<script>alert('Registro Exitoso');
                         window.location.href='./index.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.href='./index.php'</script>";
}
mysqli_close($conexiondb);
?>