<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOTEL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/normalize.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>


    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">

        </div>

        <form action="validar.php" method="POST" class="formulario">
            <div class="texto-formulario">
                <h2>HOTEL CONTROLLER</h2>
                <p>Inicia sesión con tu cuenta</p>
        
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" id="usuario" name="usuario">
            </div>
            <div class="input">
                <label for="contraseña">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" id="contraseña" name="contraseña">
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input name="btningresar" type="submit" value="Iniciar sesión">
            </div>
        </form>
    </div>
</body>

</html>