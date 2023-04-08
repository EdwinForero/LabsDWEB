<?php

use PSpell\Config;

    include("../Config/conexion.php");

    $estudiante = $_POST['estuP'];
    $materia = $_POST['matesP'];
    $cali = $_POST['cali'];


    $sql = "INSERT INTO nota(estudiante_id,materia_id,calificacion) VALUES ('$estudiante','$materia','$cali')";
    
    $resultado = mysqli_query($conexion, $sql);


    if ($resultado === TRUE) {
        header("location:../index.php");
    } else {
        echo "Datos no insertados";
    }
    