<?php

require_once 'datos.php';
class Conect extends PDO
{
	

	function __construct()
	{
		$datos = new Datos();

		try {
			parent::__construct($datos->getbdType().':host='.$datos->getbdHost().';dbname='.$datos->getbdName(), $datos->getbdUser(), $datos->getbdPass());
		} catch (PDOException $e) {

			$json = array();
			$json['conexion'] = 'Error' . $e->getMessage();
			echo "{".json_encode($json)."}";		
			exit;
		}
	}
}


?>