<?php
require_once "../conecPDO.php"; 
require_once "../conecMYSQLI.php"; 

class DatosDB 
	{
    private $mydb = null;
	
    /**
     * Constructor de clase
     */
    public function __construct() {           
        try{
            //conexión a base de datos
            //$mydb = ConectarsePDO();
			
        }catch (PDOException $e){
            //Si no se puede realizar la conexión
            //http_response_code(500);
            exit;
        }     
    } 

	/**
     * obtiene todos los registros de la tabla "tipousuario"
     * @return Array array con los registros obtenidos de la base de datos
     */


	///////Select
    public function getDatos($tabla)
		{ 
			$resultado = null;
			try {		
				$mydb = ConectarsePDO();
				
				if ($mydb!= null) 
				{				
					$query = 'SELECT * FROM '. "`".$tabla."`";
					$sql = $mydb->query($query);
					$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);	
				}
				else
				{
					//http_response_code(500);
				}
			}catch (PDOException $e){
				//Si no se puede realizar la conexión
				//http_response_code(500);
				throw new Exception($e);
				exit;
			}     	

				return $resultado; 
		}
    public function acceso($tabla,$usuario,$contrasena){
    	$resultado = null;
		try {		
			$mydb = ConectarsePDO();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM ciudadano where correo= '$usuario'  and contrasena= '$contrasena'";
				//$query = 'SELECT * FROM ' . $tabla . ' where correo= ' . $usuario . ' and contrasena= ' . 
				$sql = $mydb->query($query);
				$resultado = $sql->fetch(PDO::FETCH_ASSOC);	
			}
			else
			{
				http_response_code(500);
			}
		}catch (PDOException $e){
			throw new Exception($e);
			exit;
		}     	

		return $resultado;

    }
    public function listarSujetos()
    {
    	$resultado = null;
		try {		
			$mydb = ConectarsePDO();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM sujetosObligados";
				$sql = $mydb->query($query);
				$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);	
			}
			else
			{
				http_response_code(500);
			}
		}catch (PDOException $e){
			throw new Exception($e);
			exit;
		}     	

		return $resultado;
    }
    public function listarSolicitudSujeto($tabla,$idSuj)
    {
    	$resultado = null;
		try {		
			$mydb = ConectarsePDO();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM ". $tabla ." where idSujeto = ".$idSuj;
				$sql = $mydb->query($query);
				$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);	
			}
			else
			{
				http_response_code(500);
			}
		}catch (PDOException $e){
			throw new Exception($e);
			exit;
		}     	

		return $resultado;
    }
    public function misSolicitudes($tabla,$idTabla,$idUsusario)
    {
    	$resultado = null;
		try {		
			$mydb = ConectarsePDO();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM ". $tabla ." where idUsuario= ".$idUsusario;
				$sql = $mydb->query($query);
				$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);	
			}
			else
			{
				http_response_code(500);
			}
		}catch (PDOException $e){
			throw new Exception($e);
			exit;
		}     	

		return $resultado;
    }

    public function datosSolicitud($tabla,$idCampo,$id)
    {
    	$resultado = null;
		try {		
			$mydb = ConectarsePDO();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM ". $tabla ." where ".$idCampo."=". $id;
				//echo($query);
				$sql = $mydb->query($query);
				$resultado = $sql->fetch(PDO::FETCH_ASSOC);	
			}
			else
			{
				http_response_code(500);
			}
		}catch (PDOException $e){
			throw new Exception($e);
			exit;
		}     	

		return $resultado;
    }
		

    ///////Fin Select

    ///////Insert
				public function registro($tabla,$usu,$pas,$nom,$paterno,$materno,$calles,$numeroExterior,$numeroInterior,$entreCalles,$colonia,$CP,$entidad,$municipio,$telefono)
					{
							$resultado = null;
						try {		
									$mydb = ConectarseMYSQLI();
									//$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');

									if ($mydb!= null) 
									{				
									$resultado=$mydb->query("INSERT INTO ciudadano(idUsuario,correo,contrasena,nombre,apellidoPaterno,apellidoMaterno,calle,numeroExterior,numeroInterior,entreCalles,colonia,CP,entidad,municipio,telefono)VALUES('null',' " . $usu . "','" .$pas . "','" . $nom . "','" . $paterno . "','" . $materno . "','" . $calles . "','" . $numeroExterior . "','" . $numeroInterior . "','" . $entreCalles . "','" . $colonia . "','" . $CP . "','" . $entidad . "','" . $municipio . "','" . $telefono . "')");
									}
									else
									{
										
									}
								}catch (PDOException $e){
									throw new Exception($e);
									exit;
								}     	

						return $resultado;
					}
					function nuevaSolicitud($tabla,$folio,$fecha,$idUsuario,$idNotificaciones,$idSujeto,$nombreSujeto,$descripcion,$IdtipoDeEntrega)
					{
							$resultado = null;
						try {		
									$mydb = ConectarseMYSQLI();
									if ($mydb!= null) 
									{			
										$resultado=$mydb->query("INSERT INTO solAcceso(idAcceso,folio,fecha,idUsuario,idNotificaciones,idSujeto,nombreSujeto,descripcion,IdtipoDeEntrega,estado)
																						VALUES('null',' " . $folio . "','" . $fecha . "','" . $idUsuario . "','" . $idNotificaciones . "','" . $idSujeto . "','" . $nombreSujeto . "','" . $descripcion . "','" . $IdtipoDeEntrega . "','0')");
								
								  }
									else
									{
										
									}
								}catch (PDOException $e){
									throw new Exception($e);
									exit;
								}     	

						return $resultado;
					
					}
					function respuestaSolicitud($tabla,$idAcceso,$descripcion,$urlImagen,$urlPDF,$estado)
						{
								$resultado = null;
								try {		
											$mydb = ConectarseMYSQLI();
											//$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');

											if ($mydb!= null) 
											{			
												$resultado=$mydb->query("INSERT INTO respuestaSolicitud(idRespSol,idAcceso,descripcion,urlImagen,urlPDF)
																								VALUES('null',' " . $idAcceso . "','" . $descripcion . "','" . $urlImagen . "','" . $urlPDF . "','" . $estado . ")");
										
											}
											else
											{
												
											}
										}catch (PDOException $e){
											throw new Exception($e);
											exit;
										}     	

										return $resultado;
					
						
						}
						
						function nuevoRecurso($idUsuario, $folio, $idTipoDeEntrega, $idSujeto, $nombreSujeto, $causa, $motivo, $pruebas, $fecha)
						{
							$resultado = null;
								try {		
											$mydb = ConectarseMYSQLI();
											if ($mydb!= null) 
											{			
												$resultado=$mydb->query("INSERT INTO recRevision(idRecurso,idUsuario,folio,idTipoDeEntrega,idSujeto,nombreSujeto,causa,motivo,pruebas,fecha,estado)
												VALUES('null',' " . $idUsuario . "','" . $folio . "','" . $idTipoDeEntrega . "','" . $idSujeto . "','" . $nombreSujeto . "','" . $causa . "','" . $motivo . "','" . $pruebas . "','" . $fecha . "','0')");
											}
											else
											{
												
											}
										}catch (PDOException $e){
											throw new Exception($e);
											exit;
										}     	
										return $resultado;
						}
					function respuestaRecurso($tabla,$idRecurso,$descripcion,$urlImagen,$urlPDF,$estado)
						{
									$resultado = null;
								try {		
											$mydb = ConectarseMYSQLI();
											//$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');

											if ($mydb!= null) 
											{			
												$resultado=$mydb->query("INSERT INTO respuestaRecurso(idRespRec,idRecurso,descripcion,urlImagen,urlPDF)
																								VALUES('null',' " . $idRecurso . "','" . $descripcion . "','" . $urlImagen . "','" . $urlPDF . "','" . $estado . ")");
											}
											else
											{
												
											}
										}catch (PDOException $e){
											throw new Exception($e);
											exit;
										}     	

										return $resultado;
						}
						function nuevaDenuncia($idUsuario,$folio,$idTipoDeEntrega,$idSujeto,$nombreSujeto,$descripcion,$fecha)
						{
									$resultado = null;
								try {		
											$mydb = ConectarseMYSQLI();
											if ($mydb!= null) 
											{			
												$resultado=$mydb->query("INSERT INTO demIncumplimiento(idDemanda,idUsuario,folio,idTipoDeEntrega,idSujeto,nombreSujeto,descripcion,fecha,estado)
																								VALUES('null',' " . $idUsuario . "','" . $folio . "','" . $idTipoDeEntrega . "','" . $idSujeto . "','" . $nombreSujeto . "','" . $descripcion . "','" . $fecha . "','0')");
											}
											else
											{
												
											}
										}catch (PDOException $e){
											throw new Exception($e);
											exit;
										}     	
										return $resultado;
						
						}
						function respuestaDenuncia($tabla,$idDemanda,$descripcion,$urlImagen,$urlPDF,$estado)
						{
									$resultado = null;
								try {		
											$mydb = ConectarseMYSQLI();
											//$cnx = new mysqli('mysql.hostinger.mx', 'u331913174_erik', 'patito', 'u331913174_itai');

											if ($mydb!= null) 
											{			
												$resultado=$mydb->query("INSERT INTO respuestaRecurso(idRespSol,idDemanda,descripcion,urlImagen,urlPDF)
																								VALUES('null',' " . $idDemanda . "','" . $descripcion . "','" . $urlImagen . "','" . $urlPDF . "','" . $estado . ")");
											}
											else
											{
												
											}
										}catch (PDOException $e){
											throw new Exception($e);
											exit;
										}     	

										return $resultado;
						
						}
					///////Fin Insert

					////////////////////////////////Fin del documento 
  }
  
?>
