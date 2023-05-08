<?php
include("../Config/conexion.php");

$id = $_REQUEST['id'];

$sql = "SELECT * FROM estudiante WHERE id_e = '$id'";

$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($query);

$imagen_base64 = $row['imagen'];

if ($imagen_base64) {
  $imagen = base64_decode($imagen_base64);
  echo "<html>";
  echo "<head>";
  echo "  <meta charset='utf-8>'";
  echo " <meta name='viewport' content='width=device-width, initial-scale=1'>";
  echo " <title>Dweb-proyecto</title>";
  echo "</head>";
  echo "<body>";
  echo "<br>";
  echo "<div class='container'>";
  echo "<center><h1 class='text-center' style='background-color:black;color:white'>Foto Estudiante</h1></center>";
  echo "</div>";
  echo '<center><img src="data:image/jpeg;base64,' . $imagen_base64 . '" alt="Foto"></center>';
  echo "<div class='container'>";
  echo "<a href='../index.php' class='btn btn-dark'>Inicio</a>";
  echo "</div>";
  echo "</body";
  echo "</html>";
} else {
  echo 'Imagen no disponible';
}
