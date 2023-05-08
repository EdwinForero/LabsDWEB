<?php
    include("../Config/conexion.php");

    $id = $_POST['id'];
    $cali = $_POST['cali'];

    $sql = "UPDATE nota SET 
            calificacion ='".$cali."' WHERE id = '".$id."'";

    if($resultado = $conexion->query($sql)){
        header("location:../index.php");
    }