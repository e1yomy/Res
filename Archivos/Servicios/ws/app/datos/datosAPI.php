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
		if( !empty($status) && !empty($message) ){
			$response = array("status" => $status ,"message"=>$message);  
			echo json_encode($response,JSON_PRETTY_PRINT);    
		}            
	 }
	
	function respuestaDatos($str) {
		http_response_code(200);
		header("Content-type: application/json; charset=utf-8"); // <-- Here
		echo json_encode($str);
		//echo json_last_error();
	}
	
	function getDatos($Tabla)
	{
		try {
			$db = new DatosDB();  
			$response = $db->getDatos($Tabla);    
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
	    

    public function API()
	{
        header('Content-Type: application/JSON');
		
		$method = $_SERVER['REQUEST_METHOD'];
		//Make sure that it is a POST request.
		if(strcasecmp($method, 'POST') != 0){
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
			//echo $decoded_params->token;
			//echo $decoded_params->funcion;
			
			if(strcasecmp($decoded_params->token, '12345678') != 0){
				$this->respuestaError(500, "POST", "Token invalido.");
				exit;
			}
			
			switch ($decoded_params->funcion) {
			case 'Huerto':
				$this->getDatos('huerto');
				break;     
			case 'HuertoTipo':
				$this->getDatos('huerto_tipo');
				break;
			case 'Organigrama':
				$this->getDatos('organigrama');
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
