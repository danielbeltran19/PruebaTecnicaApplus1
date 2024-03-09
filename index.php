<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Prueba Tecnica PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
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
        <a href="pedidos/agregar_formulario.php" class="btn btn-primary">Agregar Productos</a>
        <a href="pedidos/index.php" class="btn btn-info">Ver Lista de Productos</a>
    </div>
</body>

</html>