
<?php
//recibir parametros de usuario
$idUsuario = $_POST['idUsuario'];
$folio = $_POST['folio'];
$idTipoDeEntrega = $_POST['idTipoDeEntrega'];
$idSujeto = $_POST['idSujeto'];
$nombreSujeto = $_POST['nombreSujeto'];
$causa = $_POST['causa'];
$motivo = $_POST['motivo'];
$pruebas = $_POST['pruebas'];
$fecha = $_POST['fecha'];
$contrasenaWS=$_POST['pass'];


//realizar la conexion

if($contrasenaWS == "patito")
{
	$mysqli = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');
//realizar la consulta
	$res=$mysqli->query("INSERT INTO recRevision(idRecurso,idUsuario, folio,idTipoDeEntrega, idSujeto, nombreSujeto,causa,motivo,pruebas,fecha) 
						VALUES ('null','$idUsuario','$folio',
								'$idTipoDeEntrega','$idSujeto', 
								'$nombreSujeto','$causa',
								'$motivo','$pruebas',
								'$fecha')");
}
 else
 {
 	$msg = array("msg" => "Clave incorrecta");	
 }