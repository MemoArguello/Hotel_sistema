<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","hotel");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:./vistas/admin.php");

}else if($filas['id_cargo']==2){ //cliente
header("location:./vistas/recepcion.php");

}else{
    ?>
    echo "<script>alert('No existe cuenta');
    window.location.href='index.php'</script>";
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
