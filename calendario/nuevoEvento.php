<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$reserva =$_POST['id_reserva'];
$habitacion =$_POST['id_habitacion'];
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];


$InsertNuevoEvento = "INSERT INTO recepcion (id_reserva, id_habitacion, fecha_inicio, fecha_fin) VALUES
('$reserva','$habitacion', '$fecha_inicio', '$fecha_fin')";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:index.php?e=1");

?>