<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Prueba Tecnica PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('Nav/Navbar.php');
    ?>
    <div class="container mt-5">
        <h2 class="text-center">Sistema Registro de productos.</h2>
        <h3>Categorias</h3>
        <a href="Categorias/agregar.php" class="btn btn-primary">Agregar Categoria</a>
        <a href="Categorias/listar.php" class="btn btn-info">Ver Lista de Categoria</a>

        <h3 class="mt-4">Productos</h3>
        <a href="Productos/agregar.php" class="btn btn-primary">Agregar Productos</a>
        <a href="Productos/listar.php" class="btn btn-info">Ver Lista de Productos</a>
    </div>
</body>

</html>