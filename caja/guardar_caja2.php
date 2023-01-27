<?php
include ('../db.php');

$fecha_aper  =$_POST['fecha_aper'];
$hora_aper   =$_POST['hora_aper'];

$conexiondb = conectardb();

$query = "INSERT INTO caja (fecha_aper, hora_aper, estado) VALUES
        ('$fecha_aper', '$hora_aper', 'abierto')";

$respuesta = mysqli_query($conexiondb, $query);


if ($respuesta) {
    echo "<script>alert('Registro Exitoso');
                           window.location.href='../reportes_caja2.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
                            window.location.href='../reportes_caja2.php'</script>";
}
mysqli_close($conexiondb);


?>