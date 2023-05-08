<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Básica DWEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <h1 class="text-center" style="background-color:gray;color:white">CONTROL NOTAS</h1>
    </div>
    <br>

    <div class="container">
    <div class="d-inline-block mr-3">
        <a href="forms/agregarMateria.php" class="btn btn-success">Agregar Materia</a>
    </div>
    <div class="d-inline-block mr-3">
        <a href="forms/agregarEstudiante.php" class="btn btn-success">Agregar Estudiante</a>
    </div>
    <div class="d-inline-block">
        <a href="forms/agregarNota.php" class="btn btn-success">Agregar Nota</a>
    </div>
    </div>

    <br>
    <br>

    <div class="container">
        <table class="table" id="tabla-notas">
            <thead>
                <tr style="background-color:black;color:white">
                    <th scope="col">Id</th>
                    <th scope="col">Foto Estudiante</th>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("Config/conexion.php");

                $sql = $conexion->query("SELECT * FROM nota
                        INNER JOIN estudiante ON nota.estudiante_id = estudiante.id_e
                        INNER JOIN materia ON nota.materia_id = materia.id_m
                    ");

                while ($resultado = $sql->fetch_assoc()) {

                    #$imagen_base64 = $resultado['imagen'];

                    #$imagen = base64_encode($imagen_base64);
                ?>
                    <tr>
                        <th scope="row"><?php echo $resultado['id'] ?></th>
                        <th>
                        <a href="/CRUD/imagen.php?id=<?php echo $resultado['estudiante_id'] ?>" class="btn btn-secondary">Ver Foto</a>
                        </th>
                        <th scope="row"><?php echo $resultado['nombreE'] ?></th>
                        <th scope="row"><?php echo $resultado['nombreM'] ?></th>
                        <th scope="row"><?php echo $resultado['calificacion'] ?></th>
                        <th>
                            <a href="/forms/infoTodo.php?id=<?php echo $resultado['id'] ?>" class="btn btn-info">Más Info</a>
                            <a href="/forms/editar.php?id=<?php echo $resultado['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="/CRUD/eliminar.php?id=<?php echo $resultado['id'] ?>" class="btn btn-danger">Eliminar</a>

                        </th>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>

    <br><br>
    <div class="container">
        
        <form action="" method="POST">
            <div class="form-group">
                <h2 for="buscar">Buscador</h2>
                <input type="text" class="form-control" id="buscar" name="buscar">
                <button type="submit" class="btn btn-success">Buscar</button>
            </div>
        </form>
        
        <form action="" method="POST">
            <div class="form-group">
            </div>
            <br>
            
        </form>
        <br>
        <table class="table" id="tabla-todos">
            <thead>
                <tr style="background-color:black;color:white">
                    <th scope="col">Id Nota</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Id Estudiante</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Id Materia</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Créditos</th>
                    <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("Config/conexion.php");

                if (isset($_POST['buscar']) && !empty($_POST['buscar'])) {
                    $busqueda = $_POST['buscar'];
                    $sql = $conexion->query("SELECT * FROM nota
                        INNER JOIN estudiante ON nota.estudiante_id = estudiante.id_e
                        INNER JOIN materia ON nota.materia_id = materia.id_m
                        WHERE nota.estudiante_id LIKE '%$busqueda%'
                        OR nota.estudiante_id LIKE '%$busqueda%'
                        OR nota.materia_id LIKE '%$busqueda%'
                        OR nota.calificacion LIKE '%$busqueda%'
                        OR estudiante.nombreE LIKE '%$busqueda%'
                        OR estudiante.fecha_nacimiento LIKE '%$busqueda%'
                        OR estudiante.direccion LIKE '%$busqueda%'
                        OR estudiante.correo_electronico LIKE '%$busqueda%'
                        OR materia.nombreM LIKE '%$busqueda%'
                        OR materia.descripcion LIKE '%$busqueda%'
                        OR materia.creditos LIKE '%$busqueda%'
                    ");
                }

                while ($resultado = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $resultado['id'] ?></th>
                        <th scope="row"><?php echo $resultado['calificacion'] ?></th>
                        <th scope="row"><?php echo $resultado['estudiante_id'] ?></th>
                        <th scope="row"><?php echo $resultado['nombreE'] ?></th>
                        <th scope="row"><?php echo $resultado['fecha_nacimiento'] ?></th>
                        <th scope="row"><?php echo $resultado['direccion'] ?></th>
                        <th scope="row"><?php echo $resultado['correo_electronico'] ?></th>
                        <th>
                        <a href="/CRUD/imagen.php?id=<?php echo $resultado['estudiante_id'] ?>" class="btn btn-secondary">Ver Foto</a>
                        </th>
                        <th scope="row"><?php echo $resultado['materia_id'] ?></th>
                        <th scope="row"><?php echo $resultado['nombreM'] ?></th>
                        <th scope="row"><?php echo $resultado['creditos'] ?></th>
                        <th scope="row"><?php echo $resultado['descripcion'] ?></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>