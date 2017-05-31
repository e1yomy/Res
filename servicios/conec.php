<?php
function Conectarse()
{
$servername = "mysql.hostinger.mx";
$username = "u331913174_eloy";
$password = "patito";
$database = "u331913174_tadeo";
		$mydb = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
	$conn = null;
	try {
		$conn = new PDO("mysql:host=$servername; dbname=$database; charset=UTF8", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
		}
	catch(PDOException $e)
		{
		//echo "Connection failed: " . $e->getMessage();
		}
		return $conn;
}
?>

