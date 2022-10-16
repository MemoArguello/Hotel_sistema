<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$query = "SELECT * FROM producto";
$resultado = mysqli_query($conexiondb, $query);
mysqli_close($conexiondb);
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
                <li><a href="../../Hotel_sistema/vistas/admin.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../recepcionar.php">
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
                <li><a href="./listado_productos.php">
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
            <?php
            echo "Bienvenido $usuario";
            ?>
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./listado_productos.php">Productos</a>
                <a href="./productos.php">Registrar Producto</a>
            </div>
            <div class="">
                        <table class="">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th align="center">Codigo</th>
                                    <th align="center">Nombre</th>
                                    <th align="center">PrecioCompra</th>
                                    <th align="center">PrecioVenta</th>
                                    <th align="center">Stock</th>
                                    <th align="center">Opciones</th>
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
                                    echo "<td align= 'center'>" . $producto['codigo'] . "</td>";
                                    echo "<td align= 'center'>" . $producto['nombre'] . "</td>";
                                    echo "<td align= 'center'>" . $producto['precio_compra'] . "</td>";
                                    echo "<td align= 'center'>" . $producto['precio_venta'] . "</td>";
                                    echo "<td align= 'center'>" . $producto['stock_inicial'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='./editar_producto.php?id_producto=" . $producto['id_producto'] . "' class='submitBoton'> Editar </a>";
                                    echo "<a href='./eliminar_producto.php?id_producto=" . $producto['id_producto'] . "' class='submitBotonEliminar'> Borrar </a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>