<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
    $result = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($result)) {
        if ($usuario['id_cargo'] != 2) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$query = "SELECT venta.id_venta, venta.id_producto, venta.id_cliente, venta.precio, venta.cantidad, venta.total_pagar, producto.nombre_producto, reserva.nombre
FROM venta JOIN producto ON producto.id_producto = venta.id_producto
JOIN reserva ON reserva.id = venta.id_cliente";
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
    <?php
    $conexiondb = conectardb();
    $query_r = "SELECT * FROM producto";
    $query_h = "SELECT recepcion.id_recepcion, recepcion.id_reserva, reserva.nombre FROM recepcion
    JOIN reserva ON reserva.id = recepcion.id_reserva";
    $resultado_r = mysqli_query($conexiondb, $query_r);
    $resultado_h = mysqli_query($conexiondb, $query_h);

    $id_venta = $_GET['id_venta'];
    $sql = "SELECT * FROM venta WHERE id_venta=" . $id_venta;
    $resultadov = mysqli_query($conexiondb, $sql);
    $venta = mysqli_fetch_row($resultadov);

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
                    <li><a href="./ventas2.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
                    </a></li>
                    <li><a href="../reportes_caja2.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
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
                <a href="../ventas/ventas.php">Realizar Ventas</a>
                <a href="../ventas/listado_ventas.php">Listado de Ventas</a>
            </div>
            <div class="signupFrm">
                <form action="./update_venta2.php" method="POST" class="formDatos">
                    <h3 align="center">Venta</h3>
                    <br>
                    <div class="inputContainer">
                        <select class="input" name="id_producto" id="inputGroupSelect01"></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_r)) {
                                echo "<option value='" . $habitacion['id_producto'] . "'>" . $habitacion['nombre_producto'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Producto</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id_recepcion" id="inputGroupSelect01" readonly></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_h)) {
                                echo "<option value='" . $habitacion['id_recepcion'] . "'>" . $habitacion['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Cliente</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio" min="0" value='<?php echo $venta[3]; ?>'>
                        <label for="" class="label">Precio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cantidad" min="0" value='<?php echo $venta[4]; ?>'>
                        <label for="" class="label">Cantidad</label>
                    </div>
                    <input type="hidden" name="id_venta" id="" value='<?php echo $venta[0]; ?>' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
        </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>