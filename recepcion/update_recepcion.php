<?php
include '../db.php';

$id_reserva         = $_POST['id_reserva'];
$id_habitacion      = $_POST['id_habitaciones'];

$conexion = conectardb();

$id_recepcion = $_POST['id_recepcion'];

$sql = "UPDATE `recepcion` SET `id_reserva` = '$id_reserva', `id_habitacion` = '$id_habitacion' WHERE `recepcion`.`id_recepcion` = $id_recepcion";

$respuesta= mysqli_query($conexion, $sql);

if($respuesta){
    echo"<script>alert('Se edito correctamente');
            window.location.href='./listado_recepcion.php'</script>";
}else{
    echo"<script>alert('No se pudo editar');
            window.location.href='./listado_recepcion.php'</alert>";
}
mysqli_close($conexiondb);


?>