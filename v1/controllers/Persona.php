<?php   

	require_once("utilities/DBConnection.class.php");
	/**
	* 
	*/
	class Persona extends DBConnection{

		const SUCCESS = 1;
	    const MSG_SUCCESS = "success";

		const ACCESS_DENIED = 2;
	    const MSG_ACCESS_DENIED = "Acceso denegado";

	    const UNKNOW_ERROR = 3;
	    const MSG_UNKNOW_ERROR = "Internal Server error";

	    const ERROR_PARAMETROS = 4;
		const MSG_ERROR_PARAMETROS = "Error en la estructura de los parametros";

		const ERROR = 5;
	    const MSG_ERROR = "error";

		const NOT_FOUND = 6;
	    const MSG_NOT_FOUND = "Registro no encontrado";

		
		public static function post($info){

			$action = (string)$info[1];

			if(Main::authorization()){
		    	if(self::$action())
		    		return ["estado" => self::SUCCESS, "datos" => self::MSG_SUCCESS];
		    	else
		    		throw new ExceptionApi(self::UNKNOW_ERROR, self::MSG_UNKNOW_ERROR, 500);
		    }
		    else
		    	throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403);
		
		}

		public static function get($info){

			$id     = $info[1];
			$action = $info[0];

	    	if(Main::authorization()){

	    		$res = self::read($id, $action);

				switch ($res['status']) {
					case 'success':
						$res['status'] = self::MSG_SUCCESS;
						return ["estado" => self::SUCCESS, "datos" => $res];
						break;
					case 'error':
						$res['status'] = self::MSG_NOT_FOUND;
						throw new ExceptionApi(self::NOT_FOUND, $res, 404);
						break;
					default:
						$res['status'] = self::MSG_UNKNOW_ERROR;
						throw new ExceptionApi(self::UNKNOW_ERROR, $res, 500);
						break;
				}
	    	}
			else
		    	throw new ExceptionApi(self::ACCESS_DENIED, self::MSG_ACCESS_DENIED, 403);

	    }


	    private static function read($id, $action){

	    	$response = "";

	    	switch ($action) {
	    		case 'persona':

	    			$consult = "SELECT * FROM personas WHERE id = $id";

			    	$resultado = DBConnection::query_assoc($consult);
	
			    	if($resultado == "")
			    		$response = array("status" => "unknow_error");
			    	else if(count($resultado) == 0)
			    		$response = array("status" => "error");
			    	else
			    		$response = array("status" => "success", "data" => $resultado[0]);
	    			break;
	    	}
		    	

	    	return $response;

	    }

	    private static function validateStructure($data){
	    	$response = FALSE;
	    	return $response;
	    }

	}

?>
