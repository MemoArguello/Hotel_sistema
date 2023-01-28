<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$sql = "SELECT usuario, id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
$result_vista = mysqli_query($conexiondb, $sql);
while ($usuario= mysqli_fetch_assoc($result_vista )) {
    if ($usuario['id_cargo'] != 2) {
        header("location:../index.php");
    }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$id_categoria = $_GET['id'];
$query = "SELECT * FROM reserva where id=" . $id_categoria;
$resultado = mysqli_query($conexiondb, $query);
$reserva = mysqli_fetch_row($resultado);

$query_c = "SELECT * FROM habitaciones";
$resultado_c = mysqli_query($conexiondb, $query_c);
$habitacion = mysqli_fetch_row($resultado_c);
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
                <li><a href="../calendario/index2.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../admin/listado/form_habitaciones2.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="../reportes2.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../producto/listado_productos2.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../ventas/ventas2.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Ventas</span>
                    </a></li>
                    <li><a href="../reportes_caja2.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a>
                        <i class="uil uil-user"></i>
                        <span class="link-name"><?php echo "Usuario: $usuario"; ?></span>
                    </a>
                </li>
                <li><a href="../cerrar_sesion.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Cerrar Sesión</span>
                    </a></li>

                <li class="mode">

                    <div class="mode-toggle">
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="../IMG/recepcionista.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="signupFrm">
                <form action="./update_reserva2.php" method="POST" class="formRecepcion">
                    <h3 align="center">Editar Cliente</h3>
                    <br>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cedula" value='<?php echo $reserva[1]; ?>'>
                        <label for="" class="label">Numero de Cedula</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre" value='<?php echo $reserva[2]; ?>'>
                        <label for="" class="label">Nombres</label>
                    </div>

                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="telefono" value='<?php echo $reserva[3]; ?>'>
                        <label for="" class="label">Telefono</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="procedencia" value='<?php echo $reserva[4]; ?>'>
                        <label for="" class="label">Procedencia</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="factura" value='<?php echo $reserva[5]; ?>'>
                        <label for="" class="label">Factura</label>
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