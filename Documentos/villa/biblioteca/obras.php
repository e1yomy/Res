<?php
	header("Content-Type: application/json");
	function mostrar_libros($detalle)
	{
		$config = parse_ini_file("config.ini");
		$conexion= new mysqli($config["server"],$config["username"],$config["password"],$config["dbname"]);
		if($conexion->connect_error){
			die("Error al conextarse a la base de datos");
		}
		if($detalle=="lista")
		{
			$consuta="select * from libros";
		}
		else
		{
			$consuta="select autor,titulo from libros where id=".$detalle;
		}
		$resultado=$conexion->query($consuta);
		while ($fila=$resultado->fetch_array()) {
			$todoslostitulos[]=$fila;
		}
		return $todoslostitulos;
	}
	function mostrar_autores($detalle)
	{
		$config = parse_ini_file("config.ini");
		$conexion= new mysqli($config["server"],$config["username"],$config["password"],$config["dbname"]);
		if($conexion->connect_error){
			die("Error al conextarse a la base de datos");
		}
		if($detalle=="lista")
		{
			$consuta="select * from autores";
		}
		else
		{
			$consuta="select nombre, nacionalidad, profesion from autores where id=".$detalle;
		}
		$resultado=$conexion->query($consuta);
		while ($fila=$resultado->fetch_array()) {
			$todoslosautores[]=$fila;
		}
		return $todoslosautores;
	}
	function guardar_nuevo_autor()
	{
		$config = parse_ini_file("config.ini");
		$conexion= new mysqli($config["server"],$config["username"],$config["password"],$config["dbname"]);
		if($conexion->connect_error){
			die("Error al conextarse a la base de datos");
		}
		$consulta = "insert into autores (nombre, nacionalidad,profesion) values('".$_POST["nombre"]."','".$_POST["nacionalidad"]."','".$_POST["profesion"]."')";
		$conexion->query($consulta);
		header('Location:../../');

	}











	if($_GET['peticion']=='libro')
	{
		$resultado= mostrar_libros($_GET['detalle']);
	}
	else if ($_GET['peticion']=='autor') {
		if($_GET['detalle']=='nuevo')
		{
			guardar_nuevo_autor();
		}
		else
		{
			$resultado= mostrar_autores($_GET['detalle']);
		}
	}
	else
	{
		header('HTTP/1.1 405 Method not allowed');
	}
	echo json_encode($resultado);
?>