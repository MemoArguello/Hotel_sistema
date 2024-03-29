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
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/registrar.css">
    <link rel="stylesheet" href="./CSS/normalize.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario"></div>
        <form action="validar.php" method="POST" class="formulario">
            <div class="texto-formulario">
                <h2>HOTEL CONTROLLER</h2>
                <br>
                <p>Inicia sesión con tu cuenta</p>
                <br>
            </div>
            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="usuario">
                <label for="" class="label">Usuario</label>
            </div>
            <div class="inputContainer">
                <input type="password" class="input" placeholder="a" name="codigo">
                <label for="" class="label">Contraseña</label>
            </div>
            <input type="submit" class="submitBtn" value="INGRESAR">
        </form>
    </div>
</body>