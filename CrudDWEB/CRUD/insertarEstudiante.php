<?php

use PSpell\Config;

    include("../Config/conexion.php");

    $nombreE = $_POST['nombreE'];
    $fecha = $_POST['fecha'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $cadenaT = $_POST['cadenaTexto'];

    $sql = "INSERT INTO estudiante(nombreE, fecha_nacimiento, direccion, correo_electronico, imagen) VALUES ('$nombreE','$fecha','$direccion', '$email', '$cadenaT')";
    
    $resultado = mysqli_query($conexion, $sql);


    if ($resultado === TRUE) {
        header("location:../index.php");
    } else {
        echo "Datos no insertados";
    }
    