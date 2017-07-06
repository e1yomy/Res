<!DOCTYPE html>
<html>
<head>
	<title>Consumir webservice REST</title>
	<style type="text/css">
		div{
			float: none;
			border: 1px solid red;
		}
	</style>
</head>
<body>
<div>
<?php
	$autorURL="http://localhost/villa/biblioteca/autor/lista";
	$libroURL="http://localhost/villa/biblioteca/libro/lista";
	$autorJSON = file_get_contents($autorURL);
	$libroJSON = file_get_contents($libroURL);
	$autores = json_decode($autorJSON);
	$libros = json_decode($libroJSON);

	echo "<h1>Libros</h1>";
	echo "<ul>";
	foreach ($libros as $libro) {
		echo "<li><strong>".$libro->autor."</strong><br>".$libro->titulo."</li>";
	}
	echo "</ul>";
	echo "<h1>Autores</h1>";
	echo "<table>";
	echo "<tr><th>Nombre</th><th>Nacionalidad</th><th>Profesion</th></tr>";
	foreach ($autores as $autor) {
		echo "<tr>";
		echo "<td>";
		echo $autor->nombre;
		echo "</td>";
		echo "<td>";
		echo $autor->nacionalidad;
		echo "</td>";
		echo "<td>";
		echo $autor->profesion;
		echo "</td>";
		
		echo "</tr>";
	}
	echo "</ul>";
?>
	
</div>

<div>
<form method="POST" action="biblioteca/autor/nuevo">
	<h1>Agregar autor</h1>
	<label>Nombre</label>
	<input type="text" name="nombre"><br>
	<label>Nacionalidad</label>
	<input type="text" name="nacionalidad"><br>
	<label>Profesion</label>
	<input type="text" name="profesion"><br>
	<input type="submit" value="Enviar">
</form>
</div>
</body>
</html>