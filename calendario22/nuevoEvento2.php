<?php
include('../db.php');
$cedula =$_POST['cedula'];
$nombre =$_POST['nombre'];
$telefono =$_POST['telefono'];
$procedencia = $_POST['procedencia'];
$factura = $_POST['factura'];


$conexiondb = conectardb();

$query = "INSERT into reserva(cedula, nombre, telefono, procedencia, factura) VALUES
('$cedula','$nombre','$telefono','$procedencia','$factura')";

$respuesta = mysqli_query($conexiondb, $query);
if ($respuesta) {
  echo "<script>alert('Registro Exitoso');
                          window.location.href='./index2.php'</script>";
} else {
  echo "<script>alert('Registro Fallido');
                          window.location.href='./index2.php'</script>";
}
mysqli_close($conexiondb);
?>