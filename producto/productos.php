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
        if ($usuario['id_cargo'] != 1) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
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
<?php
    $conexiondb = conectardb();
    $query = "SELECT * FROM proveedores";
    $resultadop = mysqli_query($conexiondb, $query);

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
                    <li><a href="../reportes_caja.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
                <li><a href="../admin/listado/form_cuentas.php">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Configuracion</span>
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
                <a href="./listado_productos.php">Productos</a>
                <a href="./productos.php">Registrar Producto</a>
                <a href="./proveedores.php">Proveedores</a>
                <a href="./agg_proveedor.php">Agregar Proveedor</a>
                <a href="./list_compra.php">Compras</a>
            </div>
            <div class="signupFrm">
                <form action="./insert_producto.php" method="POST" class="form_producto">
                    <h1 class="title">Registrar Productos</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="codigo">
                        <label for="" class="label">Codigo</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_producto">
                        <label for="" class="label">Nombre Producto</label>
                    </div>
                    <div class="inputContainer">
                    <select class="input" name="id_proveedor" id="inputGroupSelect01"></P>
                            <?php
                            while ($proveedores = mysqli_fetch_assoc($resultadop)) {
                                echo "<option value='" . $proveedores['id_proveedor'] . "'>" . $proveedores['nombre_prov'] . "</option>";
                            }
                            ?>
                        </select>                        
                        <label for="" class="label">Proveedor</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio">
                        <label for="" class="label">Precio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="stock_inicial">
                        <label for="" class="label">Cantidad</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>