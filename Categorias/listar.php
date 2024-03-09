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
    <script type="text/javascript" src="../js/validate.js"></script>
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
        <h3>Lista de Categorias</h3>
        <a href="../index.php" class="btn btn-info">Volver</a>
    </div>
    <div class="container">
        <table class="table table-striped table-hover" id="table1">
            <thead class="thead-dark">
                <tr class="center">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <?php
            include('../Database/conexion.php');
            $categoria = new Database();
            $listado = $categoria->read();
            ?>
            <tbody>
                <?php
                while ($row = mysqli_fetch_object($listado)) {
                    $i = 0;
                    $id = $row->id;
                    $nombre = $row->nombre;
                    ?>

                    <tr>
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td>
                            <?php echo $nombre; ?>
                        </td>
                        <td>
                            <a href="editar.php?id=<?php echo $id; ?>" class="btn btn-primary" id="<?php echo $id; ?>"
                                title="Editar">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                        </td>
                        <td>
                            <a onclick="return Confirmation()" class="btn btn-danger"
                                href="eliminar.php?id=<?php echo $id; ?>" title="Eliminar"><i
                                    class="fa fa-trash">Eliminar</i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table1').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>