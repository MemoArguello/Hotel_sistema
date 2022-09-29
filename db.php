<?php
    function conectardb() {
        $servidor = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $db = 'hotel';

        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $db);

        return $conexion;
    }
?>