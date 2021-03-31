
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Empleado</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Custom styles for this template -->
	

</head>
<body>
  <div class="container">
    <div class="row mt-4">
      <h1 class="h1">Editar Empleado</h1>
    </div>
    <div class="row">
      <div>
        <p>Los campos con asteriscos (*) son obligatorios</p>
      </div>
    </div>
    <div class="row m-2">
      <div class="col-9">
        <form class="m-2 needs-validation" method="post" action="#">
        <?php
        require_once('class/ctr_opciones.php');
        require_once('class/ctr_empleados.php');
                    $empleado = new Empleados();
        $opciones = new Opciones();
            $user = $_GET['u'];
            
            $empleado->buscarEmpleado($user);
            echo '
            <div class="row m-2">
            <div class="col-3 text-end">
              <label for="fullname">Nombre Completo *</label>
            </div>
            <div class="col-9">
              <input value="'.$nombre.'" class="form-control" type="text" name="fullname" id="fullname" placeholder="Nombre completo del empleado" required="required">
            </div>
          </div>

          <div class="row m-2">
            <div class="col-3 text-end">
              <label for="email">Correo electrónico *</label>
            </div>
            <div class="col-9">
              <input class="form-control" type="email" name="email" id="email" placeholder="Correo electrónico" required="required">
            </div>
          </div>

          <div class="row m-2">
            <div class="col-3 text-end">
              <label for="sexo">Sexo *</label>
            </div>
            <div class="col-9">
              <div class="d-block">
                <div class="custom-control custom-radio">
                  <input id="male" name="sexo" type="radio" class="form-check-input" value="M" required>
                  <label class="custom-control-label" for="male">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="female" name="sexo" type="radio" class="form-check-input" value="F" required>
                  <label class="custom-control-label" for="female">Femenino</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row m-2">
            <div class="col-3 text-end">
              <label>Área *</label>
            </div>
            <div class="col-9">
              <select class="form-select" name="area">'.
                $opciones->listarAreas()
               .'
              </select>
            </div>
          </div>

          <div class="row m-2">
            <div class="col-3 text-end">
              <label for="description">Descripción *</label>
            </div>
             <div class="col 9">
              <textarea class="form-control" name="desciption" id="description" rows="3" placeholder="Descripción de la experiencia del empleado"></textarea>
             </div>
          </div>

          <div class="row m-2">
            <div class="col-3"></div>
            <div class="col-9">
              <input class="form-check-input" type="checkbox" name="boletin" id="boletin">
              <label for="boletin">Deseo recibir boletin informativo</label>
            </div>
          </div>

          <div class="row m-2">
            <div class="col-3 text-end">
              <label for="rol">Roles *</label>
            </div>
            <div class="col 9">
              <div class="d-block">
              <?php

                echo $opciones->listarRoles();

                ?>
            </div>
          </div>
            ';
        ?>
          

          <div class="row mt-2">
            <div class="col-3"></div>
            <div class="col-9">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
              <a href="index.php" class="btn btn-primary btn-lg btn-block">Atras</a>
            </div>
          </div>
          
        
      </form>
      </div>
      
    </div>
    
  
  
  </div>
  


 

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

<script src="js/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php 
require_once('class/ctr_empleados.php');
$empleado = new Empleados();

if (isset($_POST['fullname'])) {
  $nombre = $_POST['fullname'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$area = $_POST['area'];
$boletin = isset($_POST['boletin']);
$descripcion = $_POST['desciption'];

$empleado->update($nombre,$email,$sexo,$area,$boletin,$descripcion);
}

?>
