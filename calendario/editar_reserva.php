<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
  header("location:../index.php");
}
$conexiondb = conectardb();
$id_categoria = $_GET['id'];
$query = "SELECT * FROM reserva where id=". $id_categoria;
$resultado = mysqli_query($conexiondb, $query);
$reserva = mysqli_fetch_row($resultado);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reserva</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="../CSS/registrar.css">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="../listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../../producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                <li><a href="../listado/form_cuentas.php">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Configuración</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="../cerrar_sesion.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Cerrar Sesión</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Modo Oscuro</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <?php
            echo "Bienvenido $usuario";
            ?>
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./index.php">Reservas</a>
                <a href="./registrar_reserva.php">Registrar Reserva</a>
                <a href="./registrar_reserva.php">Listado de Reservas</a>
            </div>
            <div class="signupFrm">
                <form action="./update_reserva.php" method="POST" class="form_categoria">
                    <h1 class="title">Editar Reserva</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre" value='<?php echo $reserva[1];?>'>
                        <label for="" class="label">Nombre Completo</label>
                    </div>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_inicio" value='<?php echo $reserva[2];?>'>
                        <label for="" class="label">Fecha de Inicio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_fin" value='<?php echo $reserva[3];?>'>
                        <label for="" class="label">Fecha de Salida</label>
                    </div>
                    <input type="hidden" name="id" id="" value='<?php echo $reserva[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>