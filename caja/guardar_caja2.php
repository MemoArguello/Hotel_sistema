<?php
include ('../db.php');

$fecha_aper  =$_POST['fecha_aper'];
$hora_aper   =$_POST['hora_aper'];
$usuario     = $_POST['id_usuario'];

$conexiondb = conectardb();

$query = "INSERT INTO caja (fecha_aper, hora_aper, estado) VALUES
        ('$fecha_aper', '$hora_aper', 'abierto')";

$query2 = "INSERT INTO auditoria (id_usuario, evento, fecha) VALUES
('$usuario','Apertura de caja',now())";

$respuesta = mysqli_query($conexiondb, $query);

$respuesta2 = mysqli_query($conexiondb, $query2);


if ($respuesta and $respuesta2) {
    echo "<script>alert('Registro Exitoso');
                           window.location.href='../reportes_caja2.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
                            window.location.href='../reportes_caja2.php'</script>";
}
mysqli_close($conexiondb);


?>