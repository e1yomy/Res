<?php
//recibir usuario y contraseña

//require_once "../conec.php";
$usu = $_POST['usu'];
$pin = $_POST['pin'];
$contrasenaWS=$_POST['pass'];
//conexion
$mysqli = Conectarse();
//$mysqli = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
$myArray = array();
//verificar usuario
 if($contrasenaWS == "patito")
{
//consulta
	if($result = $mysqli->query("select * from usuarios where nomUs = '$usu' and pin = '$pin'"))
		{
  	 	 while ($row = $result->fetch_array(MYSQLI_ASSOC))
  	 	 	{
        		$myArray[] = $row;
       		}
    	}
header('content-type: application/json');
echo json_encode($myArray);
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }
    

