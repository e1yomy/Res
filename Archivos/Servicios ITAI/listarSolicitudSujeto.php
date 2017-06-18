<?php
$idSujeto=$_POST['idSujeto'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
if($contrasenaWS == "patito")
{
$res=$cnx->query("select idAcceso,nombreSujeto,descripcion,fecha from solAcceso where idSujeto='$idSujeto'");

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
   