<?php
    include("../Config/conexion.php");
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM nota WHERE id = '$id'";

    $query = mysqli_query($conexion,$sql);

    if($query === TRUE){
        header("location:../index.php");
    }