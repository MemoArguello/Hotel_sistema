<?php
        include('../db.php');
        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre_producto'];
        $stock=$_POST['stock_inicial'];
        $editar = $_POST['editar'];
        $conexiondb = conectardb();

        if ($editar == "si") {
            $id_producto = $_POST['id_producto'];
            $query = "UPDATE producto SET codigo='" . $codigo . "', nombre_producto='" . $nombre . "',  stock_inicial='" . $stock."' WHERE id_producto=" . $id_producto;
        } else {
            $query = "INSERT INTO producto (codigo,nombre_producto,stock_inicial) VALUES 
            ('$codigo','$nombre',' $stock')";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='listado_productos.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='listado_productos.php'</script>";
            }
         if ($editar == "si") {
                echo ("Se pudo actualizar correctamente");
            } else {
                echo ("No se pudo actualizar");
            }
          mysqli_close($conexiondb);
?>