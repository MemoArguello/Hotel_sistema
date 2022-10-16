<?php
        include('../../db.php');
        $categoria=$_POST['nombre'];
        $editar = $_POST['editar'];
        $conexiondb = conectardb();

        if ($editar == "si") {
            $id_categoria = $_POST['categoria'];
            $query = "UPDATE categorias SET categoria='" . $categoria . "' WHERE id_categoria=" . $id_categoria;
        } else {
            $query = "INSERT INTO categorias (categoria) VALUES 
            ('$categoria')";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                        window.location.href='./categoria.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='./categoria.php'</script>";
            }
         if ($editar == "si") {
                echo ("Se pudo actualizar correctamente");
            } else {
                echo ("No se pudo actualizar");
            }
          mysqli_close($conexiondb);
?>