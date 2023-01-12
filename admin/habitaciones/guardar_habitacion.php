<?php
include('../../db.php');
    $nombre=$_POST['nombre_habitacion'];
    $detalles=$_POST['detalles'];
    $categoria=$_POST['id_categoria'];
    $precio=$_POST['precio'];


    $conexiondb = conectardb();

    $query = "INSERT INTO habitaciones(nombre_habitacion, detalles, id_categoria, precio) VALUES
    ('$nombre', '$detalles', '$categoria','$precio')";

    $respuesta = mysqli_query($conexiondb, $query);

    if($respuesta){
        echo "<script>alert('Se registro la habitacion');
            window.location.href='./registrar_habitacion.php'</script>";
    }else{
        echo "<script>alert('No se pudo registrar la habitacion');
                window.location.href='./registrar_habitacion.php'</script>";
    }
    mysqli_close($conexiondb);
?>