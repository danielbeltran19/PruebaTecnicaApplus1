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
        <h3>Editar categoria</h3>
        <a href="listar.php" class="btn btn-info">Volver</a>
    </div>
    <div class="container">
        <?php

        include("../Database/conexion.php");
        $categoria = new Database();

        // Verificar si el ID está definido y no está vacío
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $datos_categoria = $categoria->single_recordCategory($id);

            // Verificar si $datos_categoria contiene un objeto válido
            if ($datos_categoria && is_object($datos_categoria)) {
                // Verificar si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Obtener y sanitizar los datos enviados por el formulario
                    $nombre = $categoria->sanitize($_POST['nombre']);

                    // Actualizar los datos de la categoría en la base de datos
                    $res = $categoria->updateCategory($id, $nombre);

                    // Verificar si la actualización fue exitosa
                    if ($res) {
                        // Redirigir a la página de lista de categorías
                        header("Location: listar.php");
                        $message = '<script type="text/javascript">
                        alert("Datos Actualizados");
                        </script>';
                        exit; // Detener la ejecución del script después de redirigir
                    } else {
                        echo "No se pudo actualizar la categoría.";
                    }
                }
                ?>
                <div class="m"></div>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <h3 class="group1" align="center">Editar categoria </h3>
                            <form method="post">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Id:</label>
                                    <input type="number" name="id" id="id" class="form-control unput-sm text-center"
                                        placeholder="Ingrese el id categoria" value="<?php echo $datos_categoria->id; ?>"
                                        required readonly>
                                </div>

                                <div class="form-row col-md ">
                                    <div class="form-group col-md-12">
                                        <label for="inputPassword4">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control unput-sm text-center"
                                            placeholder="Ingrese la descripcion" value="<?php echo $datos_categoria->nombre; ?>"
                                            required autocomplete="off">
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <input type="submit" name="submit" value="Actualizar" class="btn btn-success btn-block">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "No se encontraron datos de la categoría.";
            }
        } else {
            echo "ID no especificado";
        }
        ?>

    </div>
</body>

</html>