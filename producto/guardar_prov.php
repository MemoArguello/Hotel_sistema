<?php
        include('../db.php');
        $nombre     =$_POST['nombre_prov'];
        $ruc        =$_POST['ruc'];
        $telefono   =$_POST['telefono'];
        $ciudad     =$_POST['ciudad'];
        $conexiondb = conectardb();

  
        $query = "INSERT INTO proveedores (nombre_prov,ruc,telefono,ciudad) VALUES 
            ('$nombre','$ruc',' $telefono', '$ciudad')";
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='proveedores.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='proveedores.php'</script>";
            }
          mysqli_close($conexiondb);
?>