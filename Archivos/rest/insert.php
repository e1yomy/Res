<?php
include 'conn.php';

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
	$sql = "INSERT INTO `pruebas`.`user` (`id`, `name`, `email`, `status`) VALUES ('$id', '$name', '$email', '$status');";

	if ($connection->query($sql)) {
	$msg = array("status" =>1 , "msg" => "Your record inserted successfully");
	} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connection);
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