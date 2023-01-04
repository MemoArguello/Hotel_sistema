<?php
include('../../db.php');
    $nombre=$_POST['nombre'];
    $detalles=$_POST['detalles'];
    $categoria=$_POST['id_categoria'];


    $conexiondb = conectardb();

    $query = "INSERT INTO habitaciones(nombre, detalles, id_categoria) VALUES
    ('$nombre', '$detalles', '$categoria')";

    $respuesta = mysqli_query($conexiondb, $query);

    if($respuesta){
        echo "<script>alert('Se registro la habitacion');
            window.location.href='./registrar_habitacion2.php'</script>";
    }else{
        echo "<script>alert('No se pudo registrar la habitacion');
                window.location.href='./registrar_habitacion2.php'</script>";
    }
    mysqli_close($conexiondb);
?>