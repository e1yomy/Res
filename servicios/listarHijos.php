<?php
$idUs=$_POST['idUs'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
if($contrasenaWS == "patito")
{
	$res=$cnx->query("select idUs, nombres, telefono from `usuarios` where idUs in (
	SELECT hijo FROM `conexiones` WHERE padre=$idUs)");
	
	$datos=array();
	
	foreach ($res as $row){
			$datos[]=$row;
	}
	
	echo json_encode($datos);
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }