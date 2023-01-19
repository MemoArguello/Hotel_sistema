<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$query = "SELECT * FROM proveedores";
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
                <li><a href="./listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../ventas/ventas.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./listado_productos.php">Productos</a>
                <a href="./productos.php">Registrar Producto</a>
                <a href="./proveedores.php">Proveedores</a>
                <a href="./agg_proveedor.php">Agregar Proveedor</a>
                <a href="./list_compra.php">Compras</a>
            </div>
            <div class="">
                <table class="">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th align="center">nombre</th>
                            <th align="center">Ruc</th>
                            <th align="center">Telefono</th>
                            <th align="center">Ciudad</th>
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
                            echo "<td align= 'center'>" . $producto['nombre_prov'] . "</td>";
                            echo "<td align= 'center'>" . $producto['ruc'] . "</td>";
                            echo "<td align= 'center'>" . $producto['telefono'] . "</td>";
                            echo "<td align= 'center'>" . $producto['ciudad'] . "</td>";
                            echo "<td>";
                            echo "<a href='./editar_prov.php?id_proveedor=" . $producto['id_proveedor'] . "' class='submitBoton'> Editar </a>";
                            echo "<a href='./eliminar_prov.php?id_proveedor=" . $producto['id_proveedor'] . "' class='submitBotonEliminar'> Borrar </a>";
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