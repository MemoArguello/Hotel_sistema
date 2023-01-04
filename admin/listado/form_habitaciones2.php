<?php
session_start();
include '../../db.php';

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
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/registrar.css">
    <link rel="stylesheet" href="./listado.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
</head>
<body>
<?php
$conexiondb = conectardb();
$consulta = "SELECT habitaciones.id_habitaciones, habitaciones.nombre, habitaciones.detalles, habitaciones.id_categoria, categorias.id_categoria, categorias.categoria FROM habitaciones JOIN categorias ON categorias.id_categoria = habitaciones.id_categoria";
$resultado = mysqli_query($conexiondb, $consulta);
mysqli_close($conexiondb);
?>
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
                <li><a href="../../Recepcion/habitaciones2.php">
                        <i class="uil uil-clipboard-notes"></i>
                        <span class="link-name">Recepción</span>
                    </a></li>
                <li><a href="form_habitaciones2.php">
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
            </ul>

            <ul class="logout-mode">
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <div class="logo_name">
                <span class="logo_name">Bienvenido <?php echo $usuario ?></span>
            </div>
            <img src="../../IMG/recepcionista.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="../listado/form_habitaciones2.php">Habitaciones Existentes</a>
                <a href="../habitaciones/registrar_habitacion2.php">Registrar Habitacion</a>
                <a href="../categoria/listado_categoria2.php">Listado Categoria</a>
                <a href="../categoria/categoria2.php">Registrar Categorias</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="">
                <table class="">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Detalles</th>
                            <th align="left">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($habitaciones = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<tr>";
                            echo "<tr>";
                            echo "<tr>";
                            echo "<th scope ='row'>" . $index++ . "</th>";
                            echo "<td align= 'center'>" . $habitaciones['nombre'] . "</td>";
                            echo "<td align= 'center'>" . $habitaciones['categoria'] . "</td>";
                            echo "<td align= 'center'>" . $habitaciones['detalles'] . "</td>";
                            echo "<td>";
                            echo "<a href='../habitaciones/editar_habitacion2.php?id_habitaciones=" . $habitaciones['id_habitaciones'] . "' class='submitBoton'> Editar </a>";
                            echo "<a href='../habitaciones/eliminar_habitacion2.php?id_habitaciones=" . $habitaciones['id_habitaciones'] . "' class='submitBotonEliminar'> Borrar </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script src="../../JS/script.js"></script>
    <script src="../../JS/registro.js"></script>
</body>
</html>