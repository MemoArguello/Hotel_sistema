<?php
        include('../../db.php');
        $categoria=$_POST['nombre'];
        $piso=$_POST['piso'];
        
        $conexiondb = conectardb();

            $id_categoria = $_POST['categoria'];
            $query = "UPDATE categorias SET categoria='" . $categoria . "', piso='" .$piso . "' WHERE id_categoria=" . $id_categoria;
 
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