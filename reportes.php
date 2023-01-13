<?php
session_start();
include './db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}

$conexiondb = conectardb();
$query1 = "SELECT COUNT(*) total1 FROM reserva";
$query2 = "SELECT COUNT(*) total2 FROM recepcion";
$query3 = "SELECT COUNT(*) total3 FROM habitaciones";
$query4 = "SELECT COUNT(*) total4 FROM producto";
$query5 = "SELECT COUNT(*) total5 FROM venta";

$resultado1 = mysqli_query($conexiondb, $query1);
$resultado2 = mysqli_query($conexiondb, $query2);
$resultado3 = mysqli_query($conexiondb, $query3);
$resultado4 = mysqli_query($conexiondb, $query4);
$resultado5 = mysqli_query($conexiondb, $query5);


?>
<style>
    .card {
        box-shadow: 0px 10px 10px -5px rgb(0 0 0 / 10%);
        background: #fff;
        padding: 1rem;
        border-radius: 3px;
        height: 50px;
    }

    .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .analytics {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2rem;
        margin-top: 0.5rem;
        margin-bottom: 2rem;
    }
    .page-content {
    padding: 1.3rem 1rem;
    background: #f1f4f9;
    }
</style>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/registrar.css">


    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
    <!---bootstrap 4 css-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- datatables css basico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <!---datatables bootstrap 4 css-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap.css">
    <title>HOTEL</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="calendario/index.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="recepcion/habitaciones.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="admin/listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="reportes.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                <li><a href="ventas/ventas.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
                    </a></li>
                <li><a href="admin/cuentas.php">
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
                <li><a href="./cerrar_sesion.php">
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

            <img src="./IMG/admin.svg" alt="">
        </div>
        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./reportes.php">General</a>
                <a href="./reportes_recepcion.php">Reporte Reservas</a>
                <a href="./reportes_habitacion.php">Reporte Habitaciones</a>
            </div>
            <div class="analytics">
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado1)) {
                            echo "<td align= 'center'>" . $reserva['total1'] . ' Clientes totales' . "</td>";
                        }
                        ?>
                        <span class="uil uil-user"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado2)) {
                            echo "<td align= 'center'>" . $reserva['total2'] . ' Habitaciones ocupadas' . "</td>";
                        }
                        ?>
                        <span class="uil uil-bed"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado3)) {
                            echo "<td align= 'center'>" . $reserva['total3'] . ' Habitaciones Registradas' . "</td>";
                        }
                        ?>
                        <span class="uil uil-house-user"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado4)) {
                            echo "<td align= 'center'>" . $reserva['total4'] . ' Productos Registrados' . "</td>";
                        }
                        ?>
                        <span class="uil uil-house-user"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado5)) {
                            echo "<td align= 'center'>" . $reserva['total5'] . ' Ventas Realizadas' . "</td>";
                        }
                        ?>
                        <span class="uil uil-house-user"></span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    

    <script src="./JS/script.js"></script>
</body>

</html>