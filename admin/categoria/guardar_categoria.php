<?php
        include('../../db.php');
        $categoria=$_POST['nombre'];
        $piso=$_POST['piso'];
        
        $conexiondb = conectardb();

        try{$query = "INSERT INTO categorias (categoria, piso) VALUES 
            ('$categoria', '$piso')";
        }finally{
            echo "<script>alert('Registros actualizados');
                                        window.location.href='./categoria.php'</script>";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                        window.location.href='./categoria.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='./categoria.php'</script>";
            }
          mysqli_close($conexiondb);
?>