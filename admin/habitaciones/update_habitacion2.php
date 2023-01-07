<?php
include('../../db.php');
$nombre = $_POST['nombre_habitacion'];
$detalles=$_POST['detalles'];
$categoria=$_POST['id_categoria'];

$conexion = conectardb();

$id_habitaciones = $_POST['habitacion'];
$query = "UPDATE habitaciones SET nombre_habitacion='" .$nombre . "', detalles='". $detalles . "', id_categoria='" . $categoria . "' WHERE id_habitaciones=" . $id_habitaciones;

$respuesta= mysqli_query($conexion, $query);

if($respuesta){
    echo"<script>alert('Se edito correctamente');
            window.location.href='../listado/form_habitaciones2.php'</script>";
}else{
    echo"<script>alert('No se pudo editar');
            window.location.href='../listado/form_habitaciones2.php'</alert>";
}
mysqli_close($conexiondb);
?>