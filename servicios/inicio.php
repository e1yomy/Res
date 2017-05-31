<?php
//recibir usuario y contraseña
$usu = $_POST['usu'];
$pas = $_POST['pas'];
$contrasenaWS=$_POST['pass'];


$caracteres= array('\'','=','+','-','*','/');
$usu = str_replace($caracteres, '', $usu);
$pas = str_replace($caracteres, '', $pas);


//conexion
$mysqli = new mysqli('mysql.hostinger.mx','u331913174_eloy','patito','u331913174_tadeo');
$myArray = array();
//verificar usuario
 if($contrasenaWS == "patito")
{
//consulta
	if($result = $mysqli->query("select * from usuarios where nomUs = '$usu' and contrasena = '$pas'"))
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
    

