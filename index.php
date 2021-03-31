<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listado de empleados</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <h1>Lista de empleados</h1>
        </div>

        <div class="row m-2">
            <table class="table table-striped">
            <div class="row">
                <div class="col-12 text-end">
                <a href="nuevo" class="btn btn-primary">Crear</a>
                </div>
            </div>
            
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Área</th>
                    <th>Boletin</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <?php
                    require_once('class/ctr_empleados.php');
                    $empleado = new Empleados();

                    $empleado->listaEmpleados();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<script src="js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>

</body>
</html>