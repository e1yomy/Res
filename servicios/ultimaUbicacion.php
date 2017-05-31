<?php
//$idUs=$_POST['idUs'];

//require_once "../conec.php";
$consulta=$_POST['consulta'];
$contrasenaWS=$_POST['pass'];
//conexion
$cnx = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
//$cnx = Conectarse();
if($contrasenaWS == "patito")
{

//$res=$cnx->query("select latitud, longitud from `ubicaciones` where idUs = $idUs order by idUb DESC LIMIT 1");
//$res=$cnx->query("select * from ubicaciones");
$res= $cnx->query($consulta);
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

