<?php
require_once "../conec.php"; 

class UsuariosDB {

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
    private function getTodos($tabla){ 
		$resultado = null;
		try {		
			$mydb = Conectarse();
			
			if ($mydb!= null) 
			{				
				$query = 'SELECT * FROM ' . $tabla;
				$sql = $mydb->query($query);
				$resultado = $sql->fetchall(PDO::FETCH_ASSOC);	
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
	
/**
     * obtiene todos los registros de la tabla "tipousuario"
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getTipoUsuario(){ 
		$resultado = null;
		$resultado = $this->getTodos("usuario_tipo");
		
		return $resultado; 
    }    
	
    /**
     * obtiene todos los registros de la tabla "usuario"
     * @return Array array con los registros obtenidos de la base de datos
     */
     public function getUsuarios(){ 
		$resultado = null;
		$resultado = $this->getTodos("usuario");
		
		return $resultado; 
    } 
    
}
?>
