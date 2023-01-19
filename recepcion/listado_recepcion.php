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
    $query = "SELECT recepcion.id_recepcion, recepcion.id_reserva, recepcion.id_habitacion, recepcion.fecha_inicio, recepcion.fecha_fin, reserva.id, reserva.cedula, reserva.nombre, habitaciones.nombre_habitacion, habitaciones.precio, TIMESTAMPDIFF(DAY, fecha_inicio, fecha_fin) AS fecha 
    FROM recepcion JOIN reserva ON reserva.id = recepcion.id_reserva
    JOIN habitaciones ON habitaciones.id_habitaciones = recepcion.id_habitacion";
    $resultado = mysqli_query($conexiondb, $query);

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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="./habitaciones.php">Recepcion</a>
                <a href="./listado_recepcion.php">Listado de Recepcion</a>
            </div>
            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Cedula</th>
                            <th>Cliente</th>
                            <th>Habitacion</th>
                            <th>Precio</th>
                            <th>Dias</th>
                            <th>Total a Pagar</th>
                            <th align="left">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($recepcion = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<tr>";
                            echo "<tr>";
                            echo "<tr>";
                            echo "<th scope ='row'>" . $index++ . "</th>";
                            echo "<td align= 'center'>" . $recepcion['cedula'] . "</td>";
                            echo "<td align= 'center'>" . $recepcion['nombre'] . "</td>";
                            echo "<td align= 'center'>" . $recepcion['nombre_habitacion'] . "</td>";
                            echo "<td align= 'center'>" . $recepcion['precio'] . 'Gs'."</td>";
                            echo "<td align= 'center'>" . $recepcion['fecha'] . ' Dias'. "</td>";
                            echo "<td align= 'center'>" . $recepcion['fecha'] * $recepcion['precio'] . 'Gs' . "</td>";
                            echo "<td>";
                            echo "<a href='./editar_recepcion.php?id_recepcion=" . $recepcion['id_recepcion'] . "' class='submitBoton'> Editar </a>";
                            echo "<a href='./eliminar_recepcion.php?id_recepcion=" . $recepcion['id_recepcion'] . "' class='submitBotonEliminar'> Borrar </a>";
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
    <script src="../JS/registro.js"></script>
</body>

</html>