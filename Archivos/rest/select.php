<?php
include 'conn.php';
//Select data from database
 
 $contrasenaWS=$_POST['pass'];

 if($contrasenaWS == "passws")
{
	$getData = "select * from user";
	$qur = $connection->query($getData);
	 
	while($r = mysqli_fetch_assoc($qur)){
	 
	$msg[] = array("name" => $r['name'], "email" => $r['email'], "status" => $r['status']);
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