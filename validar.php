<?php
$usuario=$_POST['usuario'];
$codigo=$_POST['codigo'];
session_start();
$_SESSION['usuario']=$usuario;

include 'db.php';

$conexiondb = conectardb();

$consulta= "SELECT * FROM usuarios where usuario ='$usuario' and codigo='$codigo'";
$resultado=mysqli_query($conexiondb,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:./vistas/admin.php");

}else if($filas['id_cargo']==2){ //Recepcionista
header("location:./vistas/recepcion.php");

}else{
    ?>
        echo "<script>alert('No existe cuenta');
        window.location.href='index.php'</script>";
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
