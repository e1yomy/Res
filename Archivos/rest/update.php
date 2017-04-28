<?php
include 'conn.php';
//Update record in database

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$status = $_POST['status'];
$contrasenaWS=$_POST['pass'];

$caracteres= array('\'','=','+','-','*','/');
$id= str_replace($caracteres, '', $id);
$name= str_replace($caracteres, '', $name);
$email= str_replace($caracteres, '', $email);
$status= str_replace($caracteres, '', $status);

if($contrasenaWS == "passws")
{
	$query = "UPDATE `user` SET `name`='$name' ,`email`='$email' WHERE  `id`='$id'";
	if ($connection->query($query)) {
	       $msg = array("status" =>1 , "msg" => "Record Updated successfully");
	}
	else {
	    echo "Error: " . $query . "<br>" . mysqli_error($connention);
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