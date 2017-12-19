<?php  

	require_once("utilities/DBConnection.class.php");
	/**
	* 
	*/
	class User extends DBConnection{

		const SUCCESS = 1;
	    const MSG_SUCCESS = "success";

		const ACCESS_DENIED = 2;
	    const MSG_ACCESS_DENIED = "Acceso denegado";

	    const UNKNOW_ERROR = 3;
	    const MSG_UNKNOW_ERROR = "Internal Server error";

	    const ERROR_PARAMETROS = 4;
		const MSG_ERROR_PARAMETROS = "Error en la estructura de la peticion o en los parametros";

		const ERROR = 5;
	    const MSG_ERROR = "error";

		const NOT_FOUND = 6;
	    const MSG_NOT_FOUND = "Usuario no existe";
		
		public static function post($info){

			if(Main::authorization()){
				$res = self::login();

				// echo "hola";exit;

				switch ($res['status']) {
					case 'success':
						$res['status'] = self::MSG_SUCCESS;
						return ["estado" => self::SUCCESS, "datos" => $res];
						break;
					case 'error':
						$res['status'] = self::MSG_NOT_FOUND;
						throw new ExceptionApi(self::NOT_FOUND, $res, 403);
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

		private static function login(){
			$body = $_POST['info'];
			// $body = file_get_contents('php://input');

	        $info = json_decode($body);

	        if(self::validateStructure($info))
	        	return self::auth($info);
	        else
		    	throw new ExceptionApi(self::ERROR_PARAMETROS, self::MSG_ERROR_PARAMETROS, 422);

		}

		private static function auth($info){

			$username = $info->username;
			$password = $info->password;
			$response = "success";

			$consult = "SELECT COUNT(id) count, id FROM usuarios 
						WHERE username = '$username' AND password = '$password'";

			$resultado = DBConnection::query_single_object($consult);

			if($resultado == NULL)
				$response = array("status" => "unknow_error");
		    else if(intval($resultado->count) == 0)
		    	$response = array("status" => "error");
		    else
		    	$response = array("status" => "success", "idusuario" => $resultado->id);
		    
		    return $response;
		
		}

		private static function validateStructure($info){

			$response = FALSE;
			if ($info !== NULL && count($info) === 1 && 
				isset($info->username) && isset($info->password))
	    		$response = TRUE;

	    	return $response;

		}

	}

?>