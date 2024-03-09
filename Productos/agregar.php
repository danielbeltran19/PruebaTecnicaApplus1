<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Prueba Tecnica PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Prueba Tecnica Applus Daniel Beltran Cabarcas</a>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <h2 class="text-center">Sistema Registro de productos.</h2>
        <h3>Agregar Nuevo Producto</h3>
        <a href="../index.php" class="btn btn-info">Volver</a>
    </div>
    <div class="container">
        <?php
        include("../Database/conexion.php");
        $producto = new Database();
        if (isset($_POST) && !empty($_POST)) {
            $codig = $producto->sanitize($_POST['codig']);
            $nombre = $producto->sanitize($_POST['nombre']);
            $price = $producto->sanitize($_POST['price']);
            $category_id = $producto->sanitize($_POST['category_id']);
            $res = $producto->createProduct($codig, $nombre, $price, $category_id);
            if ($res) {
                $message = '<script type="text/javascript">
                        alert("Datos insertados con exito");
                        window.location.href="listar.php";
                        </script>';
                $class = "alert alert-success";
            } else {
                $message = '<script type="text/javascript">
                        alert("No se pudieron insertar los Datos");
                        window.location.href="../Productos/agregar.php";
                        </script>';
                $class = "alert alert-danger";
            }

            ?>
            <div class="<?php echo $class ?>">
                <?php echo $message; ?>
            </div>
            <?php


        }
        ?>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <h3 class="group1" align="center"></h3>
                    <form method="post" action="" role="form">
                        <div class="form-row col-md ">
                            <div class="form-group col-md-12">
                                <label for="Codigo"></label>
                                <input type="text" name="codig" id="codig" class="form-control unput-sm text-center"
                                    placeholder="Ingrese el nombre el codigo del producto" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row col-md ">
                            <div class="form-group col-md-12">
                                <label for="name"></label>
                                <input type="text" name="nombre" id="nombre" class="form-control unput-sm text-center"
                                    placeholder="Ingrese el nombre del producto" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row col-md ">
                            <div class="form-group col-md-12">
                                <label for="name"></label>
                                <input type="number" name="price" id="price" class="form-control unput-sm text-center"
                                    placeholder="Ingrese el precio del producto" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row col-md">
                            <label></label>
                            <select name="category_id" id="category_id" class="form-control input-sm">
                                <option value="0">Seleccione una categoria</option>
                                <?php
                                $datos_categoria = $producto->ReadCategoryProduct();
                                while ($valores = mysqli_fetch_array($datos_categoria)) {
                                    $id = $valores['id'];
                                    $nombre = $valores['nombre'];
                                    echo '<option value="' . $id . '">' . $nombre . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <label for="name"></label>
                        <div class="row justify-content-md-center">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <input type="submit" name="submit" value="Guardar" class="btn btn-success btn-block">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>