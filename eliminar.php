<?php 
require_once('class/ctr_empleados.php');
$empleado = new Empleados();



$user = $_GET['u'];

$empleado->delete($user);
header('Location: ../prueba-tecnica/');


?>