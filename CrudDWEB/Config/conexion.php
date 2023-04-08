<?php

    $host = "localhost";
    $user = "root";
    $pass = "epsilon";
    $db = "appb_dweb";

    $conexion = new mysqli($host,$user,$pass,$db);

    if(!$conexion){
        echo "Conexion fallida";
    }