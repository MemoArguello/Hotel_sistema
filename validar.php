<?php
$usuario=$_POST['usuario'];
$codigo=md5($_POST['codigo']);
session_start();
$_SESSION['usuario']=$usuario;

include 'db.php';

$conexiondb = conectardb();

$consulta= "SELECT * FROM usuarios where usuario ='$usuario' and codigo='$codigo'";
$resultado=mysqli_query($conexiondb,$consulta);

$filas=mysqli_fetch_array($resultado);

if($codigo == $filas['codigo']){
    if($filas['id_cargo']==1){ //administrador
        header("location:./calendario/index.php");
    
    }else if($filas['id_cargo']==2){ //Recepcionista
        header("location:./vistas/recepcion.php");
    
    }else{
        header("location:./vistas/recepcion.php");
    }
}


mysqli_free_result($resultado);
