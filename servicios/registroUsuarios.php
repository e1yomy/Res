<?php
//recibir usuario y contraseña
$usu = $_POST['usu'];
$nom = $_POST['nom'];
$ape = $_POST['ape'];
$tel = $_POST['tel'];
$pas = $_POST['pas'];
$pin = $_POST['pin'];


$caracteres= array('\'','=','+','-','*','/');
$usu = str_replace($caracteres, '', $usu);
$pas = str_replace($caracteres, '', $pas);
$nom = str_replace($caracteres, '', $nom);
$ape = str_replace($caracteres, '', $ape);
$tel = str_replace($caracteres, '', $tel);


$contrasenaWS=$_POST['pass'];
//conexion
$mysqli = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
$myArray = array();
//verificar usuario
 if($contrasenaWS == "patito")
{
//consulta
	$res=$mysqli->query("INSERT INTO usuarios(idUs,nomUs,nombres,apellidos,telefono,contrasena,pin) 
		VALUES ('null','$usu','$nom','$ape','$tel','$pas','$pin')");
header('content-type: application/json');
echo json_encode($myArray);
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }