<?php
require_once "datosDB.php"; 

class DatosAPI {
	/**
		* Validacion de cadena JSON
	 * @param String $str CAdena JSON a validar.
	 **/
	function isValidJSON($str) {
	   json_decode($str);
	   return json_last_error() == JSON_ERROR_NONE;
	}
	
	/**
	 * Respuesta de error al cliente
	 * @param int $code Codigo de respuesta HTTP
	 * @param String $status indica el estado de la respuesta puede ser "success" o "error"
	 * @param String $message Descripcion de lo ocurrido
	 **/
	 function respuestaError($code=200, $status="", $message="") {
		http_response_code($code);
		if( !empty($strtatus) && !empty($message) ){
			$response = array("status" => $status ,"message"=>$message);  
			echo json_encode($response,JSON_PRETTY_PRINT);    
		}            
	 }
	
	function respuestaDatos($str) {
		http_response_code(200);
		header("Content-type: application/json; charset=utf-8"); // <-- Here
		echo json_encode($str);
		
	}
	
	function getDatos($Tabla)
	{
		try {
			$db = new DatosDB();  
			$response = $db->getDatos($Tabla);    
			if ($response != null )
			{
			  
				$this->respuestaDatos($response);
							
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	} 						
		function acceso($usuario,$contrasena)
	{
		try {
			$db = new DatosDB();  
			$response = $db->acceso($usuario,$contrasena);    
			if ($response != null )
			{
				$_SESSION['id'] = $response->idUs;
				//echo ($response->idUs);
				echo (json_encode($response));


				//$this->respuestaDatos($response);

				
			}else{
					$this->respuestaError(500, "NA", "Usuario o contraseña incorrectos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function listarSujetos()
	{
	try {
			$db = new DatosDB();  
			$response = $db->listarSujetos();    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}  
	}
	function nuevaSolicitud($tabla,$folio,$fecha,$idUsuario,$idNotificaciones,$idSujeto,$nombreSujeto,$descripcion,$IdtipoDeEntrega)
	{
		try {
			$db = new DatosDB();  
			$response = $db->nuevaSolicitud($tabla,$folio,$fecha,$idUsuario,$idNotificaciones,$idSujeto,$nombreSujeto,$descripcion,$IdtipoDeEntrega); 
			if ($response != null )
			{
			
				$this->respuestaDatos($response);
						
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}
	
	function respuestaSolicitud($tabla,$idAcceso,$descripcion,$urlImagen,$urlPDF,$estado)
	{
		try {
			$db = new DatosDB();  
			$response = $db->respuestaSolicitud($tabla,$idAcceso,$descripcion,$urlImagen,$urlPDF,$estado); 
			if ($response != null )
			{
			
				$this->respuestaDatos($response);
						
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function nuevoRecurso($idUsuario, $folio, $idTipoDeEntrega, $idSujeto, $nombreSujeto, $causa, $motivo, $pruebas, $fecha)
	{
		try {
			$db = new DatosDB();  
			$response = $db->nuevoRecurso($idUsuario, $folio, $idTipoDeEntrega, $idSujeto, $nombreSujeto, $causa, $motivo, $pruebas, $fecha);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function respuestaRecurso($tabla,$idRecurso,$descripcion,$urlImagen,$urlPDF,$estado)
	{
		try {
			$db = new DatosDB();  
			$response = $db->respuestaRecurso($tabla,$idRecurso,$descripcion,$urlImagen,$urlPDF,$estado); 
			if ($response != null )
			{
				$this->respuestaDatos($response);			
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function nuevaDenuncia($idUsuario,$folio,$idTipoDeEntrega,$idSujeto,$nombreSujeto,$descripcion,$fecha)
	{
		try {
			$db = new DatosDB();  
			$response = $db->nuevaDenuncia($idUsuario,$folio,$idTipoDeEntrega,$idSujeto,$nombreSujeto,$descripcion,$fecha);    
			$this->respuestaDatos($response);
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function respuestaDenuncia($tabla,$idDemanda,$descripcion,$urlImagen,$urlPDF,$estado)
	{
		try {
			$db = new DatosDB();  
			$response = $db->respuestaDenuncia($tabla,$idDemanda,$descripcion,$urlImagen,$urlPDF,$estado); 
			if ($response != null )
			{
			
				$this->respuestaDatos($response);
						
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}
	
	function listarSolicitudSujetos($tabla,$idSuj)
	{
		try {
			$db = new DatosDB();  
			$response = $db->listarSolicitudSujeto($tabla,$idSuj);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}		
	
	function misSolicitudes($tabla,$idTabla,$idUsusario)
	{
		try {
			$db = new DatosDB();  
			$response = $db->misSolicitudes($tabla,$idTabla,$idUsusario);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	
	function datosSolicitud($tabla,$idCampo,$id)
	{
		try {
			$db = new DatosDB();  
			$response = $db->datosSolicitud($tabla,$idCampo,$id);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	

	function registro($tabla,$usu,$pas,$nom,$paterno,$materno,$calles,$numeroExterior,$numeroInterior,$entreCalles,$colonia,$CP,$entidad,$municipio,$telefono)
	{
		try {
			$db = new DatosDB();  
			$response = $db->registro($tabla,$usu,$pas,$nom,$paterno,$materno,$calles,$numeroExterior,$numeroInterior,$entreCalles,$colonia,$CP,$entidad,$municipio,$telefono);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{
					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
			
	function listarTodasSolicitudes($so)
	{
		try {
			$db = new DatosDB();  
			$response = $db->listarTodasSolicitudes($so);    
			//$response = $db->listarTodasSolicitudes(3);    
			if ($response != null )
			{
				//$num = count($response);  
				$this->respuestaDatos($response);
				//echo json_encode($response);				
			}else{

					$this->respuestaError(500, "NA", "No se encontraron valores en la base de datos");
			}
		}catch (PDOException $e)
		{
			//Si no se puede realizar la conexión
			$this->respuestaError(500, "NA", $e->getMessage());
			exit;			
		}   			
	}	
	function guardarId($id,$suj)
	{

		try {
			session_start();
			$_SESSION["id"]=$id;
			$_SESSION["suj"]=$suj;
		echo($_SESSION["id"]);
		echo($_SESSION["suj"]);
		}catch (Exception $e)
		{
			exit;			
		}   			
	}


    public function API()
	{
        header('Content-Type: application/JSON');
		
		$method = $_SERVER['REQUEST_METHOD'];
		//Make sure that it is a POST request.
		if(strcasecmp($method, 'post') != 0){
			$this->respuestaError(500, "POST", "Solo se permiten peticiones POST.");
			exit;
		}	
		
		//Make sure that the content type of the POST request has been set to application/json
		$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
		if(strcasecmp($contentType, 'application/json') != 0){
			$this->respuestaError(500, "POST", "EL tipo de contenido a recibir debe ser : application/json");
			exit;
		}

		//Obtenemos el JSON
		$json_params = file_get_contents("php://input");
		
		//Verificamos que el JSON tenga formato valido
		if (strlen($json_params) > 0 && $this->isValidJSON($json_params))
		{
			$decoded_params = json_decode($json_params);
			if(strcasecmp($decoded_params->token, '12345678') != 0){
				$this->respuestaError(500, "POST", "Token invalido.");
				exit;
			}
			switch ($decoded_params->funcion) {
				case 'getDatos':
				$this->getDatos($decoded_params->tabla);
				break;
				case 'guardarId':
				$this->guardarId($decoded_params->id,$decoded_params->suj);
				break;
			case 'acceso' :
				$this->acceso($decoded_params->usuario,$decoded_params->contrasena);
				break;
				case 'accesoSujetos' :
				$this->accesoSujetos($decoded_params->tabla,$decoded_params->usuario,$decoded_params->contrasena);
				break;
			case 'listarSujetos' :
				$this->listarSujetos();
				break;  	 
			case 'registro' :
				$this->registro($decoded_params->tabla,$decoded_params->usu,$decoded_params->pas,$decoded_params->nom,$decoded_params->paterno,$decoded_params->materno,
												$decoded_params->calles,$decoded_params->numeroExterior,$decoded_params->numeroInterior,$decoded_params->entreCalles,$decoded_params->colonia,
												$decoded_params->CP,$decoded_params->entidad,$decoded_params->municipio,$decoded_params->telefono);
				break; 
				case 'listarSolicitudSujetos' :
				$this->listarSolicitudSujetos($decoded_params->tabla,$decoded_params->idSuj);
				break;
				case 'misSolicitudes' :
				$this->misSolicitudes($decoded_params->tabla,$decoded_params->idTabla,$decoded_params->idUsuario);
				break;
				case 'datosSolicitud' :
				$this->datosSolicitud($decoded_params->tabla,$decoded_params->idTabla,$decoded_params->id);
				break;
				case 'nuevaSolicitud' :
				$this->nuevaSolicitud($decoded_params->tabla,$decoded_params->folio,$decoded_params->fecha,$decoded_params->idUsuario,
															$decoded_params->idNotificaciones,$decoded_params->idSujeto,$decoded_params->nombreSujeto,
															$decoded_params->descripcion,$decoded_params->IdtipoDeEntrega);
				break;
				case 'respuestaSolicitud' :
				$this->respuestaSolicitud($decoded_params->tabla,$decoded_params->idAcceso,
																	$decoded_params->descripcion,$decoded_params->urlImagen,
																	$decoded_params->urlPDF,$decoded_params->estado);
				break;
				case 'nuevoRecurso' :
				$this->nuevoRecurso($decoded_params->idUsuario, $decoded_params->folio, $decoded_params->idTipoDeEntrega,
															$decoded_params->idSujeto, $decoded_params->nombreSujeto, $decoded_params->causa, $decoded_params->motivo,
															$decoded_params->pruebas, $decoded_params->fecha);
				break;
				case 'respuestaRecurso' :
				$this->respuestaRecurso($decoded_params->tabla,$decoded_params->idRecurso,
																	$decoded_params->descripcion,$decoded_params->urlImagen,
																	$decoded_params->urlPDF,$decoded_params->estado);
				break;
				case 'nuevaDenuncia' :
				$this->nuevaDenuncia($decoded_params->idUsuario,$decoded_params->folio,$decoded_params->idTipoDeEntrega,
														$decoded_params->idSujeto,$decoded_params->nombreSujeto,$decoded_params->descripcion,$decoded_params->fecha);
				break;
				case 'respuestaDenuncia' :
				$this->respuestaDenuncia($decoded_params->tabla,$decoded_params->idDemanda,
																	$decoded_params->descripcion,$decoded_params->urlImagen,
																	$decoded_params->urlPDF,$decoded_params->estado);
				break;
				case 'listarTodasSolicitudes' :
				$this->listarTodasSolicitudes($decoded_params->idSujeto);
				break;
			          
			default://metodo NO soportado
				$this->respuestaError(500, "NS", "Metodo no soportado.");
				break;
			}			
		}
		else{
			$this->respuestaError(500, "NJ", "No se recibio JSON Valido.");
			exit;
		}
						

    }
    
}//end class

?>
