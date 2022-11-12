<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">
    <link rel="stylesheet" href="../admin/listado/listado.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
</head>
<body>
<?php
    $conexiondb = conectardb();
    $query_r = "SELECT * FROM reserva";
    $query_h = "SELECT * FROM habitaciones";
    $resultado_r = mysqli_query($conexiondb, $query_r);
    $resultado_h = mysqli_query($conexiondb, $query_h);

    mysqli_close($conexiondb);
?>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../calendario/index.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="./recepcionar.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="../admin/listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                <li><a href="../admin/listado/form_cuentas.php">
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <div class="logo_name">
                <span class="logo_name">Bienvenido <?php echo $usuario ?></span>
            </div>
            <img src="../../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./habitaciones.php">Recepcion</a>
                <a href="../calendario/listado_reserva.php">Listado de Recepcion</a>
            </div>
        <div class="signupFrm">
            <form action="./guardar_recepcion.php" method="POST" class="formRecepcion">
                <h3 align="center">Registrar Recepcion</h3>
                <br>
                <div class="inputContainer">
                        <select class="input" name="id_reserva" id="inputGroupSelect01"></P>
                        <?php
                        while ($habitacion = mysqli_fetch_assoc($resultado_r)) {
                            echo "<option value='" . $habitacion['id'] . "'>" . $habitacion['nombre'] . "</option>";
                        }
                        ?>
                        </select>
                    <label for="" class="label">Cliente</label>
                </div>
                <div class="inputContainer">
                        <select class="input" name="id_habitacion" id="inputGroupSelect01"></P>
                        <?php
                        while ($habitacion = mysqli_fetch_assoc($resultado_h)) {
                            echo "<option value='" . $habitacion['id_habitaciones'] . "'>" . $habitacion['nombre'] . "</option>";
                        }
                        ?>
                        </select>
                    <label for="" class="label">Habitacion</label>
                </div>
                <input type="hidden" name="editar" id="" value='no' readonly>
                <input type="submit" class="submitBtn" value="GUARDAR">
            </form>
        </div>
        </div>
    </section>

    <script src="../JS/script.js"></script>
    <script src="../JS/registro.js"></script>
</body>
</html>