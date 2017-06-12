<?php
//recibir parametros de usuario
$idUsuario = $_POST['idUsuario'];
$folio = $_POST['folio'];
$IdtipoDeEntrega = $_POST['IdtipoDeEntrega'];
$idSujeto = $_POST['idSujeto'];
$nombreSujeto = $_POST['nombreSujeto'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$contrasenaWS=$_POST['pass'];

if($contrasenaWS == "patito")
{
	//realizar la conexion
	$mysqli = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
	//realizar la consulta
	$res=$mysqli->query("INSERT INTO demIncumplimiento(idDemanda,idUsuario,folio,idTipoDeEntrega,idSujeto, nombreSujeto,descripcion,fecha) 
						VALUES ('null','$idUsuario',
								'$folio','$idTipoDeEntrega',
								'$idSujeto','$nombreSujeto',
								'$descripcion','$fecha')");
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }