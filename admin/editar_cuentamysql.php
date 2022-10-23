<?php
include ('../db.php');
if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['codigo']) || empty($_POST['ccodigo'])) {
            echo "<script>alert('Todos los campos son obligatorios');
            window.location.href='./listado/form_cuentas.php'</script>";
    } else {
        $cargo=$_POST['id'];
        $correo=$_POST['correo'];
        $usuario=$_POST['usuario'];
        $password=md5($_POST['codigo']);
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
    }
}  
?>
