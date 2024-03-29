<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT * FROM `usuarios` WHERE usuario = '$usuario';";
    $result = mysqli_query($conexiondb, $sql);
    $usuarioN = mysqli_fetch_row($result);
    while ($usuario= mysqli_fetch_assoc($result)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$id_producto = $_GET['id_producto'];
$query = "SELECT * FROM producto WHERE id_producto=" . $id_producto;
$resultado = mysqli_query($conexiondb, $query);
$producto = mysqli_fetch_row($resultado);
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
                <form action="./comprar_producto.php" method="POST" class="form_categoria">
                    <h1 class="title">Comprar Productos</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="producto" value='<?php echo $producto[2]; ?>'>
                        <label for="" class="label">Producto</label>
                    </div>
                    <div class="inputContainer">
                        <?php
                        $query_categoria = mysqli_query($conexiondb, "select * FROM proveedores");
                        $result_categoria = mysqli_num_rows($query_categoria);
                        ?>
                        <select class="input" name="id_proveedor" class="" id="inputGroupSelect01"></P>
                            <?php
                            if ($result_categoria > 0) {
                                while ($categoria = mysqli_fetch_assoc($query_categoria)) {
                            ?>
                                    <option value="<?php echo $categoria['id_proveedor'] ?>"><?php echo $categoria['nombre_prov'] ?></option>
                            <?php
                                }
                            }
                            mysqli_close($conexiondb);

                            ?>
                        </select>
                        <label for="" class="label">Proveedor</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio">
                        <label for="" class="label">Precio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cantidad">
                        <label for="" class="label">Cantidad</label>
                    </div>
                    <input type="hidden" name="id_usuario" id="" value='<?php echo $usuarioN[0]; ?>' readonly>
                    <input type="hidden" name="id_producto" id="" value='<?php echo $producto[0] ?>' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>