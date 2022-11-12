<?php
        include('../db.php');
        $cedula =$_POST['cedula'];
        $nombre =$_POST['nombre'];
        $telefono =$_POST['telefono'];
        $procedencia = $_POST['procedencia'];
        $factura = $_POST['factura'];
        $cant_persona = $_POST['cant_personas'];
        $pago = $_POST['pago'];
        $f_inicio = $_POST['fecha_inicio'];
        $f_fin = $_POST['fecha_fin'];
        
        $conexiondb = conectardb();
            $id_reserva = $_POST['id'];
            $query = "UPDATE reserva SET cedula='" . $cedula . "', nombre='" . $nombre . "',telefono='" . $telefono . "',procedencia='" . $procedencia . "',factura='" . $factura . "',cant_personas='" . $cant_persona . "',pago='" . $pago . "', fecha_inicio='" .$f_inicio . "', fecha_fin='" .$f_fin .  "' WHERE id=" . $id_reserva;
 
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Se actualizo correctamente');
                                        window.location.href='./listado_reserva.php'</script>";
            } else {
                echo "<script>alert('Se actualizo correctamente');
                                        window.location.href='./listado_reserva.php'</script>";
            }
          mysqli_close($conexiondb);
?>