<?php
include ('../db.php');
        $cargo=$_POST['id'];
        $correo=$_POST['correo'];
        $usuario=$_POST['usuario'];
<<<<<<< HEAD
        $password=md5($_POST['codigo']);
=======
        $password=($_POST['codigo']);
>>>>>>> 1ec8531f8163c4cc9b41ee89d375c1561141c830
        $editar = $_POST['editar'];

        $conexiondb = conectardb();

            $sql="SELECT * FROM usuarios WHERE
            correo='$correo'";
            $result= mysqli_query($conexiondb, $sql);
            $editar = $_POST['editar'];
            if($editar  = "si"){
                    $id_usuario = $_POST['id_usuario'];
                    $sql="UPDATE usuarios SET correo='" . $correo . "', usuario='" . $usuario . "', codigo='" . $password . "', id_cargo='" . $cargo ."' WHERE id_usuario=" . $id_usuario;
                    $result=mysqli_query($conexiondb ,$sql);
                    if($result){
                    echo "<script>alert('Se edito correctamente');
                    window.location.href='./listado/form_cuentas.php'</script>";
                }else{
                    echo "<script>alert('No se edito correctamente');
                    window.location.href='./listado/form_cuentas.php'</script>";
                }
            }else{
                echo "<script>alert('El correo ya existe');
                window.location.href='./listado/form_cuentas.php'</script>";
            }   
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 1ec8531f8163c4cc9b41ee89d375c1561141c830
