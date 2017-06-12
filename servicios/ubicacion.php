<?php
//recibir parametros de usuario
$idUs = $_POST['idUs'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$fecha = $_POST['fecha'];
$contrasenaWS=$_POST['pass'];
//realizar la conexion
$mysqli = new mysqli('mysql.hostinger.mx', 'u331913174_eloy','patito','u331913174_tadeo');
if($contrasenaWS == "patito")
{
//realizar la consulta
	$res=$mysqli->query("INSERT INTO ubicaciones(idUb,idUs,latitud,longitud,fecha) 
		VALUES ('null','$idUs','$latitud','$longitud','$fecha')");
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }