<?php  

	/**
	* 
	*/
	class Main{
		

	    const AUTH = "autorization";

		public static function log($texto){
			$myfile = fopen("log.txt", "a") or die("Unable to open file!");

			$txt = "
			$texto\n";

			fwrite($myfile, $txt);
			fclose($myfile);
		
		}

		public static function authorization(){

	
			$headers = apache_request_headers();

			// foreach ($headers as $key => $value) {
			// 	self::log($key.": ".$value);
			// }
			
		    $bandera = FALSE;

		    if (isset($headers["header"])) 
		        if($headers["header"] == self::AUTH)
		        	$bandera = TRUE;
		        
		    return $bandera;

		}

		
	}

?>