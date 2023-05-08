<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
<h1 class="bg-black p-2 text-white text-center">Editar Nota</h1>
    <br>


    <div class="container">
        <form action = "../CRUD/editarNotas.php" method="POST">
            
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

            <h3>Estudiante:</h3><p><?php echo $resultado['nombreE'] ?></p><br>
            <h3>Materia:</h3><p><?php echo $resultado['nombreM'] ?></p><br>

            <div class="mb-3">
                <h3 class="form-label">Calificación</h3>
                <input type="text" name="cali" class="form-control" placeholder="Ingrese un valor numérico">
            </div>
            
            

            <input type="Hidden" class="form-control" name="id" value="<?php echo $id?>">

            <div class="text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <body>

</html>