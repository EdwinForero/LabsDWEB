<?php

use PSpell\Config;

    include("../Config/conexion.php");

    $nombre = $_POST['nombreM'];
    $creditos = $_POST['creditos'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO materia(nombreM,descripcion,creditos) VALUES ('$nombre','$desc', '$creditos')";
    
    $resultado = mysqli_query($conexion, $sql);


    if ($resultado === TRUE) {
        header("location:../index.php");
    } else {
        echo "Datos no insertados";
    }
    