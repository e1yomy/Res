<?php
$nomUs=$_POST['idUs'];
$pin=$_POST['pin'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
if($contrasenaWS == "patito")
{
$res=$cnx->query("select idUs from usuarios where nomUs='$nomUs' and pin='$pin'");

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