<?php 

class Datos{

	private $bd_type;
	private $bd_host;
	private $bd_name;
	private $bd_user;
	private $bd_pass;

	function getBdType(){
		return $bd_type = 'mysql';
	}

	function getBdHost(){
		return $bd_host = 'localhost';
	}

	function getBdName(){
		return $bd_name = 'test1';
	}

	function getBdUser(){
		return $bd_user = 'root';
	}

	function getBdPass(){
		return $bd_pass = '';
	}
}
 ?>