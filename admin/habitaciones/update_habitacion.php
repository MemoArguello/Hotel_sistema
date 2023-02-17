<?php
include('../../db.php');
$nombre = $_POST['nombre_habitacion'];
$detalles=$_POST['detalles'];
$precio=$_POST['precio'];

$conexion = conectardb();

$id_habitaciones = $_POST['habitacion'];
$query = "UPDATE habitaciones SET nombre_habitacion='" .$nombre . "', detalles='". $detalles . "', precio='" . $precio . "' WHERE id_habitaciones=" . $id_habitaciones;

$respuesta= mysqli_query($conexion, $query);

if($respuesta){
    echo"<script>alert('Se edito correctamente');
            window.location.href='../listado/form_habitaciones.php'</script>";
}else{
    echo"<script>alert('No se pudo editar');
            window.location.href='../listado/form_habitaciones.php'</alert>";
}
mysqli_close($conexiondb);
?>