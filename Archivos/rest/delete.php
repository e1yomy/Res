<?php
include 'conn.php';
//Delete record from database
$caracteres= array('\'','=','+','-','*','/');
$name = $_POST['name'];
$email = $_POST['email'];
$status = $_POST['status'];
$contrasenaWS=$_POST['pass'];
$name= str_replace($caracteres, '', $name);
$email= str_replace($caracteres, '', $email);
$status= str_replace($caracteres, '', $status);

if($contrasenaWS == "passws")
{
	$query = "DELETE FROM `user` WHERE   `name`='$name' && email = '$email'";
	if ($connection->query($query)) {
	    $msg = array("status" =>1 , "msg" => "Record Deleted successfully");
	} else {
	    echo "Error: " . $query . "<br>" . mysqli_error($connection);
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