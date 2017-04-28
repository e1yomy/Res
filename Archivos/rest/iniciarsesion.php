<?php
include 'conn.php';
//Select data from database
 $id=$_POST['id'];
 $name=$_POST['name'];
 $contrasenaWS=$_POST['pass'];

 if($contrasenaWS == "passws")
{
	$getData = "select * from user where  `id`='$id' && name = '$name'";
	$qur = $connection->query($getData);
	 
	while($r = mysqli_fetch_assoc($qur)){
	 
	$msg[] = array("id" => $r['id'], "nombre" => $r['name']);
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