<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$id_usuario = $_GET['id_usuario'];
$query_c = "SELECT * FROM cargo";
$resultado_c = mysqli_query($conexiondb, $query_c);
$cargos = mysqli_fetch_row($resultado_c);

$query = "SELECT * FROM usuarios WHERE id_usuario=" . $id_usuario;
$resultado = mysqli_query($conexiondb, $query);
$usuarios = mysqli_fetch_row($resultado);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./../CSS/style.css">
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
                <img src="./../IMG/logo.svg" alt="">
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
                <a href="./listado/form_cuentas.php">Cuentas Existentes</a>
                <a href="./cuentas.php">Registrar Cuenta</a>
            </div>
            <div class="signupFrm">
                <form action="./editar_cuentamysql.php" method="POST" class="form">
                    <h1 class="title">Editar Cuenta</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="correo" value='<?php echo $usuarios[1]; ?>'>
                        <label for="" class="label">Correo Electronico</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="usuario" value='<?php echo $usuarios[2]; ?>'>
                        <label for="" class="label">Nombre de Usuario</label>
                    </div>

                    <div class="inputContainer">
                        <?php
                        $query_rol = mysqli_query($conexiondb, "select * FROM cargo");
                        $result_cargo = mysqli_num_rows($query_rol);
                        ?>
                        <select class="input" name="id" class="" id="inputGroupSelect01">
                            <?php
                            if ($result_cargo > 0) {
                                while ($cargo = mysqli_fetch_array($query_rol)) {
                            ?>
                                    <option value="<?php echo $cargo['id'] ?>"><?php echo $cargo['descripcion'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_usuario" id="" value='<?php echo $usuarios[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="./../JS/script.js"></script>
    <?php
    mysqli_close($conexiondb);
    ?>
</body>

</html>