<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$query = "SELECT * FROM cargo ORDER BY id ASC";
$resultado = mysqli_query($conexiondb, $query);
mysqli_close($conexiondb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./../IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../calendario/index.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../Recepcion/habitaciones.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="./listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="../reportes.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../ventas/ventas.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
                    </a></li>
                    <li><a href="../reportes_caja.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
                <li><a href="../admin/listado/form_cuentas.php">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Configuración</span>
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
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./listado/form_cuentas.php">Cuentas Existentes</a>
                <a href="./cuentas.php">Registrar Cuenta</a>
            </div>
            <div class="signupFrm">
                <form action="./guardar_cuenta.php" method="POST" class="form">
                    <h1 class="title">Registrar Cuenta</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="correo">
                        <label for="" class="label">Correo Electronico</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="usuario">
                        <label for="" class="label">Nombre de Usuario</label>
                    </div>

                    <div class="inputContainer">
                        <input type="password" class="input" placeholder="a" name="codigo" minlength="5">
                        <label for="" class="label">Contraseña</label>
                    </div>

                    <div class="inputContainer">
                        <input type="password" class="input" placeholder="a" name="ccodigo" minlength="5">
                        <label for="" class="label">Confirmar Contraseña</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id" class="" id="inputGroupSelect01">
                            <?php
                            while ($cargo = mysqli_fetch_assoc($resultado)) {
                                echo "<option value='" . $cargo['id'] . "'>" . $cargo['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Cambiar Cargo</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="./../JS/script.js"></script>

</body>

</html>