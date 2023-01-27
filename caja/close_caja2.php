<?php
include ('../db.php');

$fecha_cierre  =$_POST['fecha_cierre'];
$hora_cierre   =$_POST['hora_cierre'];
$ingreso       =$_POST['ingreso'];
$egreso        =$_POST['egreso'];
$saldo_cierre   =($_POST['saldo_cierre'] = $ingreso - $egreso);
$estado        ='cerrado';

$conexiondb = conectardb();

$id_caja = $_POST['id_caja'];
$query = "UPDATE caja SET fecha_cierre='" . $fecha_cierre . "', hora_cierre='" .$hora_cierre . "',estado='" .$estado . "', saldo_cierre='" .$saldo_cierre . "' WHERE id_caja=" . $id_caja;

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo
    "<script>alert('Registro Exitoso');
    window.location.href='../reportes_caja2.php'</script>";
    echo "<script>alert('Registro Exitoso');
    window.location.href='../reportes_caja2.php'</script>";
}
mysqli_close($conexiondb);


?>