<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Nota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="bg-black p-2 text-white text-center">Asignar Nota</h1>
    <br>
    <div class="container">
        <form action = "../CRUD/insertarNotas.php" method="POST">
            <label for="">Estudiante</label>
            <select class="form-select mb-3" name="estuP">
                <option selected disabled>--Seleccionar estudiante--</option>
                <?php
                include("../Config/conexion.php");

                $sql = $conexion->query("SELECT * FROM estudiante");

                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['id_e'] . "'>" . $resultado['nombreE'] . " - " . $resultado['id_e'] ."</option>";
                }
                ?>
            </select>
            <label for="mat">Materia</label>
            <select class="form-select mb-3" name="matesP">
                <option selected disabled>--Seleccionar materia--</option>
                <?php
                include("../Config/conexion.php");

                $sql = $conexion->query("SELECT * FROM materia");

                while ($resultado = $sql->fetch_assoc()) {
                    echo "<option value='" . $resultado['id_m'] . "'>" . $resultado['nombreM'] . " - " . $resultado['id_m'] . "</option>";
                }
                ?>
            </select>
            <div class="mb-3">
                <label class="form-label">Calificación</label>
                <input type="text" name="cali" class="form-control" placeholder="Ingrese un valor numérico">
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