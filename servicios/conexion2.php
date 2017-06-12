<?php
//recibir parametros de usuario
$padre = $_POST['padre'];
$hijo = $_POST['hijo'];
$contrasenaWS=$_POST['pass'];
//realizar la conexion
$mysqli = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
if($contrasenaWS == "patito")
{
//realizar la consulta
	$res=$mysqli->query("INSERT INTO conexiones(idCnx,padre,hijo) 
		VALUES ('null','$padre','$hijo')");
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }