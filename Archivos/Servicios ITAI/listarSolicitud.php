<?php
$id=$_POST['id'];
$tabla=$_POST['tabla'];
$idUsuario=$_POST['idUsuario'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
if($contrasenaWS == "patito")
{
$res=$cnx->query("select $id,nombreSujeto,fecha from $tabla where idUsuario='$idUsuario'");

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
   