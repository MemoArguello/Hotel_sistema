<?php
session_start();
include './db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}
$conexiondb = conectardb();
$query = "SELECT * FROM caja";
$resultado = mysqli_query($conexiondb, $query);
mysqli_close($conexiondb);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/registrar.css">
    <link rel="stylesheet" href="admin/listado/listado.css">

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
                    <li><a href="reportes_caja.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
                <li><a href="admin/listado/form_cuentas.php">
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
        <div>
        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./reportes_caja.php">General</a>
                <a href="./caja/caja.php">Abrir Nueva caja</a>
            </div>
            <div class="">
                <table class="">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th align="center">Fecha apertura</th>
                            <th align="center">Hora Apertura</th>
                            <th align="center">Fecha cierre</th>
                            <th align="center">hora_cierre</th>
                            <th align="center">Ingreso</th>
                            <th align="center">Egreso</th>
                            <th align="center">Saldo_Cierre</th>
                            <th align="center">Estado</th>
                            <th align="center">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($producto = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<tr>";
                            echo "<tr>";
                            echo "<th scope ='row'>" . $index++ . "</th>";
                            echo "<td align= 'center'>" . $producto['fecha_aper'] . "</td>";
                            echo "<td align= 'center'>" . $producto['hora_aper'] . "</td>";
                            echo "<td align= 'center'>" . $producto['fecha_cierre'] . "</td>";
                            echo "<td align= 'center'>" . $producto['hora_cierre'] . "</td>";
                            echo "<td align= 'center'>" . $producto['ingreso'] . " Gs". "</td>";
                            echo "<td align= 'center'>" . $producto['egreso'] . " Gs"."</td>";
                            echo "<td align= 'center'>" . $producto['saldo_cierre'] . " Gs". "</td>";
                            echo "<td align= 'center'>" . $producto['estado'] . "</td>";
                            echo "<td>";
                            echo "<a href='./caja/editar_caja.php?id_caja=" . $producto['id_caja'] . "' class='submitBoton'> Editar </a>";
                            echo "<a href='./caja/eliminar_caja.php?id_caja=" . $producto['id_caja'] . "' class='submitBotonEliminar'>Borrar</i></a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='./caja/cerrar_caja.php?id_caja=" . $producto['id_caja'] . "' class='submitBotonPass'>Cerrar</i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="JS/script.js"></script>

</body>
</html>