<?php
include ('../db.php');

$fecha_cierre  =$_POST['fecha_cierre'];
$hora_cierre   =$_POST['hora_cierre'];
$ingreso       =$_POST['ingreso'];
$egreso        =$_POST['egreso'];
$saldo_cierre   =($_POST['saldo_cierre'] = $ingreso - $egreso);
$usuario        =$_POST['id_usuario'];
$estado        ='cerrado';

$conexiondb = conectardb();

$id_caja = $_POST['id_caja'];
$query = "UPDATE caja SET fecha_cierre='" . $fecha_cierre . "', hora_cierre='" .$hora_cierre . "',estado='" .$estado . "', saldo_cierre='" .$saldo_cierre . "' WHERE id_caja=" . $id_caja;

$query2 = "INSERT INTO auditoria (id_usuario, evento, fecha) VALUES
('$usuario','Apertura de caja',now())";

$respuesta = mysqli_query($conexiondb, $query);
$respuesta2 = mysqli_query($conexiondb, $query2);

if ($respuesta and $respuesta2) {
    echo
    "<script>alert('Registro Exitoso');
    window.location.href='../reportes_caja.php'</script>";
    echo "<script>alert('Registro Exitoso');
    window.location.href='../reportes_caja.php'</script>";
}
mysqli_close($conexiondb);


?>