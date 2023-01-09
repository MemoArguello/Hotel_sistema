<?php
        include('../db.php');
        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $compra=$_POST['precio_compra'];
        $venta=$_POST['precio_venta'];
        $stock=$_POST['stock_inicial'];
        $conexiondb = conectardb();

            $query = "INSERT INTO producto (codigo,nombre,precio_compra,precio_venta,stock_inicial) VALUES 
            ('$codigo','$nombre','$compra',' $venta',' $stock')";
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='listado_productos2.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='listado_productos2.php'</script>";
            }
          mysqli_close($conexiondb);
?>