<?php
        include('../db.php');
        $nombre=$_POST['nombre'];
        $f_inicio=$_POST['fecha_inicio'];
        $f_fin=$_POST['fecha_fin'];
        
        $conexiondb = conectardb();

            $id_reserva = $_POST['id'];
            $query = "UPDATE reserva SET nombre='" . $nombre . "', fecha_inicio='" .$f_inicio . "', fecha_fin='" .$f_fin .  "' WHERE id=" . $id_reserva;
 
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