<?php
//recibir usuario y contraseña
$idUs = $_POST['idUs'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$contrasenaWS=$_POST['pass'];

$contrasenaWS=$_POST['pass'];
//conexion
$mysqli = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
$myArray = array();
//verificar usuario
 if($contrasenaWS == "patito")
{
//consulta
	$res=$mysqli->query("INSERT INTO ultUb(idUb,idUs,latitud,longitud) 
		VALUES ('null','$idUs','$latitud','$longitud')");
header('content-type: application/json');
echo json_encode($myArray);
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }