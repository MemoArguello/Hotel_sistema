<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('../db.php');

$idEvento         = $_POST['id_recepcion'];
$start            = $_REQUEST['start'];
$fecha_inicio     = date('Y-m-d', strtotime($start)); 
$end              = $_REQUEST['end']; 
$fecha_fin        = date('Y-m-d', strtotime($end));  


$UpdateProd = ("UPDATE recepcion 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'
    WHERE id_recepcion='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

?>