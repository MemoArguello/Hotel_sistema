<?php
session_start();
include './../../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../../index.php");
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
$id_habitaciones = $_GET['id_habitaciones'];
$query_c = "SELECT * FROM categorias";
$resultado_c = mysqli_query($conexiondb, $query_c);
$categorias = mysqli_fetch_row($resultado_c);

$query = "SELECT * FROM habitaciones WHERE id_habitaciones=" . $id_habitaciones;
$resultado = mysqli_query($conexiondb, $query);
$habitacion = mysqli_fetch_row($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/registrar.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../../IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../../calendario/index.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="../../reportes.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../../producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../../ventas/ventas.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
                    </a></li>
                    <li><a href="../../reportes_caja.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
                <li><a href="../listado/form_cuentas.php">
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
                <li><a href="../../cerrar_sesion.php">
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
            <img src="../../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="../listado/form_habitaciones.php">Habitaciones Existentes</a>
                <a href="./registrar_habitacion.php">Registrar Habitacion</a>
                <a href="../categoria/listado_categoria.php">Listado Categoria</a>
                <a href="../categoria/categoria.php">Registrar Categorias</a>
            </div>
            <div class="signupFrm">
                <form action="./update_habitacion.php" method="POST" class="form_habitacion">
                    <h1 class="title">Editar Habitacion</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_habitacion" value='<?php echo $habitacion[1]; ?>'>
                        <label for="" class="label">Nombre</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="detalles" value='<?php echo $habitacion[2]; ?>'>
                        <label for="" class="label">Detalles</label>
                    </div>
                    <div class="inputContainer">
                        <?php
                        $query_categoria = mysqli_query($conexiondb, "select * FROM categorias");
                        $result_categoria = mysqli_num_rows($query_categoria);
                        ?>
                        <select class="input" name="id_categoria" class="" id="inputGroupSelect01"></P>
                            <?php
                            if ($result_categoria > 0) {
                                while ($categoria = mysqli_fetch_assoc($query_categoria)) {
                            ?>
                                    <option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['categoria'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio" value='<?php echo $habitacion[4]; ?>'>
                        <label for="" class="label">Precio</label>
                    </div>
                    <input type="hidden" name="habitacion" id="" value='<?php echo $habitacion[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="../../JS/script.js"></script>

</body>

</html>