<?php

$idUs=$_POST['idUs'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$contrasenaWS=$_POST['pass'];

$cnx = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
if($contrasenaWS == "patito")
{
$res=$cnx->query("update ultUb set latitud='$latitud', longitud='$longitud' where idUs='$idUs'");

}

 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }
 
