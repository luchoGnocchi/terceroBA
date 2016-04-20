<?php
	$host = "localhost"; 
	$usuario = "root"; 
	$password = ""; 
	$db = "iti"; 
	$conexion = mysqli_connect($host, $usuario, $password,$db); 
		
	if($conexion->connect_errno >0)
	{
		die('No se pudo conectar a la base de datos');
	

}

 ?>


