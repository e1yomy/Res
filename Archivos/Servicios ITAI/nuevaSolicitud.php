<?php
//recibir parametros de usuario
$folio = $_POST['folio'];
$fecha = $_POST['fecha'];
$idUsuario = $_POST['idUsuario'];
$idNotificaciones = $_POST['idNotificaciones'];
$idSujeto = $_POST['idSujeto'];
$nombreSujeto = $_POST['nombreSujeto'];
$descripcion = $_POST['descripcion'];
$IdtipoDeEntrega = $_POST['idTipoDeEntrega'];
$contrasenaWS=$_POST['pass'];



//realizar la conexion
$mysqli = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');

if($contrasenaWS == "patito")
{
	
	
//realizar la consulta
	$res=$mysqli->query("INSERT INTO solAcceso(idAcceso,folio,fecha,idUsuario,idNotificaciones,idSujeto,nombreSujeto,descripcion,idTipoDeEntrega) 
						VALUES ('null','$folio', 
								'$fecha','$idUsuario', 
								'$idNotificaciones','$idSujeto', 
								'$nombreSujeto','$descripcion',
								'$IdtipoDeEntrega')");
								
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }