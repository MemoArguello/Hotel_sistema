<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index");
}
$conexiondb = conectardb();
$id_recepcion = $_GET['id_recepcion'];
$query = "SELECT * FROM recepcion WHERE id_recepcion=" . $id_recepcion;
$resultado = mysqli_query($conexiondb, $query);
$recepcion = mysqli_fetch_row($resultado);
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
                <li><a href="../Recepcion/habitaciones.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="../admin/listado/form_habitaciones.php">
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
                <a href="./habitaciones.php">Recepcion</a>
                <a href="./listado_recepcion.php">Listado de Recepcion</a>
            </div>
            <div class="signupFrm">
                <form action="./update_recepcion.php" method="POST" class="formRecepcion">
                    <h3 align="center">Registrar Recepcion</h3>
                    <br>
                    <div class="inputContainer">
                        <?php
                        $query_reserva = mysqli_query($conexiondb, "SELECT * FROM reserva");
                        $result_reserva = mysqli_num_rows($query_reserva);
                        ?>
                        <select class="input" name="id_reserva" id="inputGroupSelect01" value='<?php echo $recepcion[1]; ?>'></P>
                            <?php
                                if ($result_reserva > 0) {
                                    while ($reserva = mysqli_fetch_assoc($query_reserva)) {
                                ?>
                                        <option value="<?php echo $reserva['id'] ?>"><?php echo $reserva['nombre'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
                    <br>
                    <div class="inputContainer">
                        <?php
                        $query_habitaciones = mysqli_query($conexiondb, "SELECT * FROM habitaciones");
                        $result_habitaciones= mysqli_num_rows($query_habitaciones);
                        ?>
                        <select class="input" name="id_habitaciones" id="inputGroupSelect01" value='<?php echo $recepcion[2]; ?>'></P>
                            <?php
                                if ($result_habitaciones > 0) {
                                    while ($habitaciones = mysqli_fetch_assoc($query_habitaciones)) {
                                ?>
                                        <option value="<?php echo $habitaciones['id_habitaciones'] ?>"><?php echo $habitaciones['nombre_habitacion'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
                    <br>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_inicio" value='<?php echo $recepcion[3]; ?>'>
                        <label for="" class="label">Fecha de Entrada</label>
                    </div>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_fin" value='<?php echo $recepcion[4]; ?>'>
                        <label for="" class="label">Fecha de Salida</label>
                    </div>
                    <input type="hidden" name="id_recepcion" id="" value='<?php echo $recepcion[0] ?>' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
        </div>
    </section>

    <script src="../JS/script.js"></script>
    <script src="../JS/registro.js"></script>
</body>

</html>