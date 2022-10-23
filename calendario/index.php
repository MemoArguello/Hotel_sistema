<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
  header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reserva</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="../CSS/registrar.css">
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
        <li><a href="#">
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
      <div class="logo_name">
        <span class="logo_name">Bienvenido <?php echo $usuario ?></span>
      </div>
      <img src="../IMG/admin.svg" alt="">
    </div>
    <div class="dash-content">
      <div class="topnav" id="myTopnav">
        <a href="./index.php">Reservas</a>
        <a href="./registrar_reserva.php">Registrar Reserva</a>
        <a href="./listado_reserva.php">Listado de Reservas</a>
      </div>
      <br>
      <br>
      <br>
      <?php
      $con = conectardb();
      $SqlEventos   = ("SELECT * FROM reserva");
      $resulEventos = mysqli_query($con, $SqlEventos);

      ?>
      <div class="mt-5"></div>

      <div class="container">
        <div class="row">
          <div class="col msjs">
          </div>
        </div>

      </div>



      <div id="calendar"></div>
    </div>
  </section>



  <script src="../JS/script.js"></script>

  <script src="js/jquery-3.0.0.min.js"> </script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script src='locales/es.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#calendar").fullCalendar({
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaWeek,agendaDay"
        },

        locale: 'es',

        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Nuevo Evento
        select: function(start, end) {
          $("#exampleModal").modal();
          $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

          var valorFechaFin = end.format("DD-MM-YYYY");
          var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
          $('input[name=fecha_fin').val(F_final);

        },

//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event.id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},
        events: [
          <?php
          while ($dataEvento = mysqli_fetch_array($resulEventos)) {
          ?> {
              id: '<?php echo $dataEvento['id']; ?>',
              title: '<?php echo $dataEvento['nombre']; ?>',
              start: '<?php echo $dataEvento['fecha_inicio']; ?>',
              end: '<?php echo $dataEvento['fecha_fin']; ?>',
            },
          <?php }
          ?>
        ],


      });


    });
  </script>
</body>

</html>