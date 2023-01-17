<?php
        include('../db.php');
        $cedula =$_POST['cedula'];
        $nombre =$_POST['nombre'];
        $telefono =$_POST['telefono'];
        $procedencia = $_POST['procedencia'];
        $factura = $_POST['factura'];
        
        $conexiondb = conectardb();
            $id_reserva = $_POST['id'];
            $query = "UPDATE reserva SET cedula='" . $cedula . "', nombre='" . $nombre . "',telefono='" . $telefono . "',procedencia='" . $procedencia . "',factura='" . $factura . "' WHERE id=" . $id_reserva;
 
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Se actualizo correctamente');
                                        window.location.href='./listado_reserva2.php'</script>";
            } else {
                echo "<script>alert('Se actualizo correctamente');
                                        window.location.href='./listado_reserva2.php'</script>";
            }
          mysqli_close($conexiondb);
?>