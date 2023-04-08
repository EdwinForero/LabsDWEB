<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Registrar Materia</h1>
    <br>
    <div class="container">
        <form action = "../CRUD/insertarMateria.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre Materia</label>
                <input type="text" name="nombreM" class="form-control" placeholder="Ingrese el nombre de la materia">
            </div>
            <div class="mb-3">
                <label class="form-label">Creditos</label>
                <input type="text" name="creditos" class="form-control" placeholder="Ingrese un valor numérico">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="desc" class="form-control" placeholder="Ingrese una descripción">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
                <a href="../index.php" class="btn btn-dark">Regresar</a>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>