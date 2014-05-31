<?php
	function conectarse(){
		$servidor = "localhost";
		$usuario = "root";
		$password = "root";
		$db = "php_contacto";

		$conectar = new mysqli($servidor,$usuario,$password,$db);
		return $conectar;
	}

	$conexion = conectarse();
?>