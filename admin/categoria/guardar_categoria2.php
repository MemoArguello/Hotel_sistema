<?php
        include('../../db.php');
        $categoria=$_POST['nombre'];
        $piso=$_POST['piso'];
        
        $conexiondb = conectardb();

        $query = "INSERT INTO categorias (categoria, piso) VALUES 
            ('$categoria', '$piso')";
        
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                        window.location.href='./categoria2.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='./categoria2.php'</script>";
            }
          mysqli_close($conexiondb);
?>