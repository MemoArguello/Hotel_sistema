<?php
include ('../db.php');
        $cargo=$_POST['id'];
        $correo=$_POST['correo'];
        $usuario=$_POST['usuario'];
        $password=md5($_POST['codigo']);
        $cpassword=md5($_POST['ccodigo']);

        $conexiondb = conectardb();

        if($password==$cpassword){
            $sql="SELECT * FROM usuarios WHERE
            correo='$correo'";
            $result= mysqli_query($conexiondb, $sql);
            if(!$result->num_rows>0){
                    $sql="INSERT INTO usuarios (correo, usuario, codigo, id_cargo) VALUES 
                    ('$correo', '$usuario', '$password','$cargo')";
                $result=mysqli_query($conexiondb ,$sql);
    
                if($result){
                    echo "<script>alert('Usuario registrado');
                   window.location.href='./listado/form_cuentas.php'</script>";
                }else{
                    echo "<script>alert('Usuario no registrado');
                    window.location.href='./cuentas.php'</script>";
                }
            }else{
                echo "<script>alert('El correo ya existe');
                window.location.href='./cuentas.php'</script>";
            }
        }else{
            echo "<script>alert('La contraseña no coincide, vuelva a intentarlo');
            window.location.href='./cuentas.php'</script>";
        }
        mysqli_close($conexiondb);

?>