<?php
include 'conn.php';
//Select data from database
 $correo=$_POST['correo'];
 $contrasena=$_POST['contrasena'];
 $contrasenaWS=$_POST['pass'];


$caracteres= array('\'','=','+','-','*','/');
$correo = str_replace($caracteres, '', $correo);
$contrasena = str_replace($caracteres, '', $contrasena);



 if($contrasenaWS == "patito")
{
	$getData = "select * from ciudadano where  `correo`='$correo' && 'contrasena' = '$contrasena'";
	$qur = $connection->query($getData);
	 
	while($r = mysqli_fetch_assoc($qur)){
	 
	$msg[] = array("correo" => $r['correo'], "contrasena" => $r['contrasena']);
	}
 }
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }
 $json = $msg;
header('content-type: application/json');
echo json_encode($json);
 
@mysqli_close($conn);
 
?>