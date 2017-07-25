<?php
function ConectarseMYSQLI()
{
$servername = "mysql.hostinger.mx";
$username = "u331913174_erik";
$password = "patito";
$database = "u331913174_itai";

	$conn = null;
	try {
		$conn = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
		return $conn;
	}
	catch(Exception $e){

	}
}
?>

