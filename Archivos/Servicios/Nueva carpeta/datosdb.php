<?php
require_once "../conec.php"; 

class DatosDB 
	{
    private $mydb = null;
	
    /**
     * Constructor de clase
     */
    public function __construct() {           
        try{
            //conexión a base de datos
            //$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
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
			$mydb = Conectarse();
			
			if ($mydb!= null) 
			{				
				$query = "SELECT * FROM ". $tabla ." where ".$idCampo."=". $id;
				//echo($query);
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
    ///////Fin Select
    ////////////////////////////////Fin del documento 
	}
  
?>
