<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

$sqlDeleteEvento = ("DELETE FROM recepcion WHERE  id_recepcion='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);

?>
  