<?php
        include('../db.php');
        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre_producto'];
        $proveedor= $_POST['id_proveedor']; 
        $stock=$_POST['stock_inicial'];
        $conexiondb = conectardb();
        

  
        $query = "INSERT INTO producto (codigo,nombre_producto, id_proveedor, stock_inicial) VALUES 
            ('$codigo','$nombre', '$proveedor', '$stock')";
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='listado_productos.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='listado_productos.php'</script>";
            }
          mysqli_close($conexiondb);
?>