<?php
session_start();
include '../../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../../index.php");
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
$id_categoria = $_GET['id_categoria'];
$query = "SELECT * FROM categorias where id_categoria=". $id_categoria;
$resultado = mysqli_query($conexiondb, $query);
$categoria = mysqli_fetch_row($resultado);
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
    <link rel="stylesheet" href="../listado/listado.css">

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
                <li><a href="../../calendario/index2.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../listado/form_habitaciones2.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="../../reportes2.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../../producto/listado_productos2.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../../ventas/ventas2.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Ventas</span>
                    </a></li>
                    <li><a href="../../reportes_caja2.php">
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
            <img src="../../IMG/recepcionista.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="../listado/form_habitaciones2.php">Habitaciones Existentes</a>
                <a href="../habitaciones/registrar_habitacion2.php">Registrar Habitacion</a>
                <a href="../categoria/listado_categoria2.php">Listado Categoria</a>
                <a href="categoria2.php">Registrar Categorias</a>
            </div>
            <div class="signupFrm">
                <form action="./update_categoria2.php" method="POST" class="form_categoria">
                    <h3 class="title">Editar Categoria</h3>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre" value='<?php echo $categoria[1]; ?>'>
                        <label for="" class="label">Nombre Categoria</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="piso" value='<?php echo $categoria[2]; ?>'>
                        <label for="" class="label">Ingrese Piso</label>
                    </div>
                    <input type="hidden" name="categoria" id="" value='<?php echo $categoria[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../../JS/script.js"></script>

</body>

</html>