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
                <li><a href="#">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Reservas</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-clipboard-notes"></i>
                    <span class="link-name">Recepción</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-bed"></i>
                    <span class="link-name">Habitación</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Reportes</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-coffee"></i>
                    <span class="link-name">Productos</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Configuración</span>
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="./IMG/user.jpg" alt="">
        </div>

       

        </div>
    </section>

    <script src="./JS/script.js"></script>
</body>
</html>