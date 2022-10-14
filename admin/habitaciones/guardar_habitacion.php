<?php
include('../../db.php');
    $nombre=$_POST['nombre'];
    $categoria=$_POST['categoria'];
    $detalles=$_POST['detalles'];

    $conexiondb = conectardb();

    $query = "INSERT INTO habitaciones(nombre, categoria, detalles) VALUES
    ('$nombre', '$categoria', '$detalles')";

    $respuesta = mysqli_query($conexiondb, $query);

    if($respuesta){
        echo "<script>alert('Se registro la categoria');
            window.location.href='./registrar_habitacion.php'</script>";
    }else{
        echo "<script>alert('No se pudo registrar categoria');
                window.location.href='./registrar_habitacion.php'</script>";
    }
    mysqli_close($conexiondb);
?>