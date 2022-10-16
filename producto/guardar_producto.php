<?php
        include('../db.php');
        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $compra=$_POST['precio_compra'];
        $venta=$_POST['precio_venta'];
        $stock=$_POST['stock_inicial'];
        $editar = $_POST['editar'];
        $conexiondb = conectardb();

        if ($editar == "si") {
            $id_producto = $_POST['id_producto'];
            $query = "UPDATE producto SET codigo='" . $codigo . "', nombre='" . $nombre . "', precio_compra='" . $compra . "', precio_venta='" . $venta ."', stock_inicial='" . $stock."' WHERE id_producto=" . $id_producto;
        } else {
            $query = "INSERT INTO producto (codigo,nombre,precio_compra,precio_venta,stock_inicial) VALUES 
            ('$codigo','$nombre','$compra',' $venta',' $stock')";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='productos.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='productos.php'</script>";
            }
         if ($editar == "si") {
                echo ("Se pudo actualizar correctamente");
            } else {
                echo ("No se pudo actualizar");
            }
          mysqli_close($conexiondb);
?>