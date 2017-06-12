<?php
include 'conn.php';


$contrasenaWS=$_POST['pass'];

$usu = $_POST['usu'];
$pas = $_POST['pas'];
$nom = $_POST['nom'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$calles =$_POST['calles'];
$numeroExterior = $_POST['numeroExterior'];
$numeroInterior = $_POST['numeroInterior'];
$entreCalles =$_POST['entreCalles'];
$colonia = $_POST['colonia'];
$CP = $_POST['CP'];
$entidad = $_POST['entidad'];
$municipio = $_POST['municipio'];
$telefono = $_POST['telefono'];

$caracteres= array('\'','=','+','-','*','/');
$usu = str_replace($caracteres, '', $usu);
$pas = str_replace($caracteres, '', $pas);
$nom = str_replace($caracteres, '', $nom);
$paterno = str_replace($caracteres, '', $paterno);
$materno = str_replace($caracteres, '', $materno);
$calles = str_replace($caracteres, '', $calles);
$numeroExterior = str_replace($caracteres, '', $numeroExterior);
$numeroInterior = str_replace($caracteres, '', $numeroInterior);
$entreCalles = str_replace($caracteres, '', $entreCalles);
$colonia = str_replace($caracteres, '', $colonia);
$CP = str_replace($caracteres, '', $CP);
$entidad = str_replace($caracteres, '', $municipio);
$telefono = str_replace($caracteres, '', $telefono);

if($contrasenaWS == "passws")
{
	$sql = "INSERT INTO `ITAI`.`ciudadano` (idUsuario,correo,contrasena,nombre,apellidoPaterno,apellidoMaterno,calles,
	numeroExterior,numeroInterior,entreCalles,colonia,CP,entidad,municipio,telefono) 
	VALUES ('null','$usu','$pas','$nom',
			'$paterno','$materno',
			'$calles',
			'$numeroExterior','$numeroInterior',
			'$entreCalles','$colonia',
			'$CP','$entidad','$municipio',
			'$telefono');";

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