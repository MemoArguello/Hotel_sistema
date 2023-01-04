<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./CSS/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
            <!---bootstrap 4 css-->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- datatables css basico-->
        <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
        <!---datatables bootstrap 4 css-->
        <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap.css">
    <title>HOTEL</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="calendario/index2.php">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Reservas</span>
                </a></li>
                <li><a href="recepcion/habitaciones2.php">
                    <i class="uil uil-clipboard-notes"></i>
                    <span class="link-name">Recepción</span>
                </a></li>
                <li><a href="admin/listado/form_habitaciones2.php">
                    <i class="uil uil-bed"></i>
                    <span class="link-name">Habitación</span>
                </a></li>
                <li><a href="reportes2.php">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Reportes</span>
                </a></li>
                <li><a href="producto/listado_productos2.php">
                    <i class="uil uil-coffee"></i>
                    <span class="link-name">Productos</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
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


            
            <img src="./IMG/recepcionista.svg" alt="">
        </div>
        <div>       
<br>
<br>
<br>
<div class="container">
    <br>
    <div class"row">
        <div class="col-lg-12">
          <table id="tablaUsuarios" class="table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>telefono</th>
                    <th>Procedencia</th>
                    <th>Factura</th>
                    <th>Fecha de Entrada</th>
                    <th>Fecha de salida</th>
                </tr>
            </thead>
          </table>
        </div>
    </div>
</div>
<!--Jquery. popper.js, Bootstrap JS-->
<script src="jquery/jquery-3.5.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--Datatables JS-->
<script type="text/javascript" src="datatables/datatables.min.js"></script>
<!--Para usar botones en datatables JS-->
<script src="datatables/Buttons-2.3.2/js/dataTables.buttons.js"></script>
<script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="datatables/pdfmake-0.1.36/pdfmake.js"></script>
<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="datatables/Buttons-2.3.2/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaUsuarios').DataTable( {
            //para usar botones
            responsive: "true",
            dom: 'Bfrtilp',
            buttons:[
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'                        
                },
                {
                    extend: 'print',
                    text: 'imprimir',
                    titleAttr: 'imprimir',
                    className: 'btn btn-info'                        
                },
            ],
            "ajax":{
                "url": "list.php",
                "dataSrc":""
            },
            "columns":[
                {"data": "id"},
                {"data": "cedula"},
                {"data": "nombre"},
                {"data": "telefono"},
                {"data": "procedencia"},
                {"data": "factura"},
                {"data": "fecha_inicio"},
                {"data": "fecha_fin"},
            ]
        });
    });
</script>
        </div>
    </section>

    <script src="./JS/script.js"></script>
</body>
</html>