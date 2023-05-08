<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
        include("../Config/conexion.php");

        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM nota
            INNER JOIN estudiante ON nota.estudiante_id = estudiante.id_e
            INNER JOIN materia ON nota.materia_id = materia.id_m
            WHERE nota.id = '$id'";

        $query = mysqli_query($conexion, $sql);

        $resultado = mysqli_fetch_assoc($query)
    ?>

    <h1 class="bg-white p-2 text-black text-left">ESTUDIANTE</h1>
    <h3>ID:</h3><p><?php echo $resultado['estudiante_id'] ?></p><br>
    <h3>Nombre:</h3><p><?php echo $resultado['nombreE'] ?></p><br>
    <h3>Fecha de nacimiento:</h3><p><?php echo $resultado['fecha_nacimiento'] ?></p><br>
    <h3>Dirección:</h3><p><?php echo $resultado['direccion'] ?></p><br>
    <h3>Email:</h3><p><?php echo $resultado['correo_electronico'] ?></p><br>

    <h3>Foto:</h3>
    <a href="/CRUD/imagen.php?id=<?php echo $resultado['estudiante_id'] ?>" class="btn btn-warning">Ver Foto</a><br>

    <br><h1 class="bg-white p-2 text-black text-left">MATERIA</h1>
    <h3>ID:</h3><p><?php echo $resultado['materia_id'] ?></p><br>
    <h3>Nombre:</h3><p><?php echo $resultado['nombreM'] ?></p><br>
    <h3>Créditos:</h3><p><?php echo $resultado['creditos'] ?></p><br>
    <h3>Descripción:</h3><p><?php echo $resultado['descripcion'] ?></p><br>

    <h1 class="bg-white p-2 text-black text-left">NOTA</h1>
    <h3>ID:</h3><p><?php echo $resultado['id'] ?></p><br>
    <h3>Calificación:</h3><p><?php echo $resultado['calificacion'] ?></p><br>

    <div class="text-center">
        <a href="../index.php" class="btn btn-dark">Regresar</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>