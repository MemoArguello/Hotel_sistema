<?php
        include('../db.php');
        $codigo         =$_POST['codigo'];
        $nombre         =$_POST['nombre_producto'];
        $precio         =$_POST['precio'];
        $stock          =$_POST['stock_inicial'];
        $conexiondb     =conectardb();

        $id_producto = $_POST['id_producto'];
        $query = "UPDATE producto SET codigo='" . $codigo . "', nombre_producto='" . $nombre . "', precio ='" . $precio ."',  stock_inicial='" . $stock."' WHERE id_producto=" . $id_producto;

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