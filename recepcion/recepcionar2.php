<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$query = "SELECT * FROM habitaciones";
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
    <link rel="stylesheet" href="../CSS/style.css">
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
                <li><a href="../Recepcion/habitaciones2.php">
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
            <?php
            echo "Bienvenido $usuario";
            ?>
            <img src="../IMG/recepcionista.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="../calendario/index2.php">Calendario</a>
                <a href="./recepcionar2.php">Registrar Cliente</a>
            </div>
            <div class="signupFrm">
                <form action="../calendario/nuevoEvento2.php" method="POST" class="formRecepcion">
                    <h3 align="center">Recepcion</h3>
                    <br>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cedula">
                        <label for="" class="label">Numero de Cedula</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre">
                        <label for="" class="label">Nombres</label>
                    </div>

                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="telefono">
                        <label for="" class="label">Telefono</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="procedencia">
                        <label for="" class="label">Procedencia</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="factura">
                        <label for="" class="label">Factura</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cant_personas">
                        <label for="" class="label">Cantidad de Personas</label>
                    </div>
                    <div class="inputContainer">
                        <select name="pago" class="input">
                            <option value=""></option>
                            <option value="Pagado">Pagado</option>
                            <option value="No pagado">Falta Pagar</option>
                        </select>
                        <label for="" class="label">Estado de Pago</label>
                    </div>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_inicio">
                        <label for="" class="label">Fecha de Inicio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_salida">
                        <label for="" class="label">Fecha de Salida</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="../js/script.js"></script>

</body>

</html>