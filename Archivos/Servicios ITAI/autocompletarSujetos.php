<?php

$nombre=$_POST['nombre'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
if($contrasenaWS == "patito")
{
$res=$cnx->query("select idSuj, nombre from sujetosObligados where nombre like '%$nombre%'");

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
   