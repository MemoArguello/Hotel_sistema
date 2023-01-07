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
                <li><a href="../calendario/index2.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="./habitaciones2.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
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
            </ul>

            <ul class="logout-mode">
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


            <div class="logo_name">
                <span class="logo_name">Bienvenido <?php echo $usuario ?></span>
            </div>
            <img src="../../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./habitaciones2.php">Recepcion</a>
                <a href="">Listado de Recepcion</a>
            </div>
        <div class="signupFrm">
            <form action="./guardar_recepcion2.php" method="POST" class="formRecepcion">
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
                            echo "<option value='" . $habitacion['id_habitaciones'] . "'>" . $habitacion['nombre_habitacion'] . "</option>";
                        }
                        ?>
                        </select>
                    <label for="" class="label">Habitacion</label>
                </div>
                <div class="inputContainer">
                    <input type="date" class="input" placeholder="a" name="fecha_inicio">
                    <label for="" class="label">Fecha de Entrada</label>
                </div>
                <div class="inputContainer">
                    <input type="date" class="input" placeholder="a" name="fecha_fin">
                    <label for="" class="label">Fecha de Salida</label>
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