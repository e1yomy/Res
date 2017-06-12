<?php
//recibir parametros de usuario
$usu = $_POST['usu'];
$pas = $_POST['pas'];
$nom = $_POST['nom'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$calles = $_POST['calles'];
$numeroExterior = $_POST['numeroExterior'];
$numeroInterior = $_POST['numeroInterior'];
$entreCalles =$_POST['entreCalles'];
$colonia = $_POST['colonia'];
$CP = $_POST['CP'];
$entidad = $_POST['entidad'];
$municipio = $_POST['municipio'];
$telefono = $_POST['telefono'];
$contrasenaWS=$_POST['pass'];
//realizar la conexion
$mysqli = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
if($contrasenaWS == "patito")
{
//realizar la consulta
	$res=$mysqli->query("INSERT INTO ciudadano(idUsuario,correo,contrasena,nombre,apellidoPaterno,apellidoMaterno,calle,
		numeroExterior,numeroInterior,entreCalles,colonia,CP,entidad,municipio,telefono) 
		VALUES ('null','$usu','$pas','$nom',
			'$paterno','$materno',
			'$calles',
			'$numeroExterior','$numeroInterior',
			'$entreCalles','$colonia',
			'$CP','$entidad','$municipio',
			'$telefono')");
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }