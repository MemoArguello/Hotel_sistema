<?php
        include('../db.php');
        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre_producto'];
        $proveedor= $_POST['id_proveedor']; 
        $precio= $_POST['precio'];
        $stock=$_POST['stock_inicial'];
        $total_pagar    =($_POST['total_pagar'] = $precio * $stock);
        $conexiondb = conectardb();
        

  
        $query = "INSERT INTO producto (codigo,nombre_producto, id_proveedor, precio, stock_inicial) VALUES 
            ('$codigo','$nombre', '$proveedor','$precio', '$stock')";
        $respuesta = mysqli_query($conexiondb, $query);

        $query2 = "UPDATE caja SET egreso= (egreso +" . $total_pagar. ") WHERE estado= 'abierto'";
        $respuesta2 = mysqli_query($conexiondb, $query2);

        if ($respuesta and $respuesta2) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='listado_productos2.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='listado_productos2.php'</script>";
            }
          mysqli_close($conexiondb);
?>