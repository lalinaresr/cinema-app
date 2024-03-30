<?php  
	
	/**
	* [cryp description]
	* @param  [type] $id [description]
	* @return [type]     [description]
	*/
	function cryp($id){
		$numbers = array("0","1","2","3","4","5","6","7","8","9");
		$strings = array("a","b","c","x","y","z","p","q","r","s");
		$chars = "1234567890defghijklmnotuvw"; 
		$length_letters = 8; 
		$string_one = ""; 
		$string_two = "";

		$string_replace = str_replace($numbers, $strings, $id);

		for($i=0; $i<$length_letters; $i++){
			$string_one .= substr($chars, rand(0,strlen($chars)), 1);
			$string_two .= substr($chars, rand(0,strlen($chars)), 1);
		}

		$encrypt = $string_one . $string_replace . $string_two;

	    return $encrypt; 
	}

	/**
	* [decryp description]
	* @param  [type] $id [description]
	* @return [type]     [description]
	*/
	function decryp($id){
		$numbers = array("0","1","2","3","4","5","6","7","8","9");
		$strings = array("a","b","c","x","y","z","p","q","r","s");
		$lenght_id = strlen($id);
		$the_cryp = "";

		for($i=0; $i<$lenght_id; $i++){
			if(
				$id[$i]=="a" ||
				$id[$i]=="b" ||
				$id[$i]=="c" ||
				$id[$i]=="x" ||
				$id[$i]=="y" ||
				$id[$i]=="z" ||
				$id[$i]=="p" ||
				$id[$i]=="q" ||
				$id[$i]=="r" ||
				$id[$i]=="s"
				){
				$the_cryp .= $id[$i];
			}
		}

		$decryp = str_replace($strings, $numbers, $the_cryp);

	    return $decryp;
	}

	/**
	* [get_antiquity description]
	* @param  [type] $date [description]
	* @return [type]       [description]
	*/
	function get_antiquity($date){
		date_default_timezone_set('America/Mexico_City');
		$stamp_date = strtotime($date);
		$stamp_current = time();

		$difference_dates = $stamp_current - $stamp_date;

		if($difference_dates < 120){
			$response = "Hace unos segundos";
		}else if ((120 <= $difference_dates) && ($difference_dates < 7200)) { 
			$response = "Hace ".round( $difference_dates/60 )." minutos";
		}else if ((7200 <= $difference_dates) && ($difference_dates < 172800)) {
			$response = "Hace ".round( ($difference_dates/60)/60 )." horas";
		}else if ((172800 <= $difference_dates) && ($difference_dates < 604800)) {
			$response = "Hace ".round((($difference_dates/60)/60)/24)." dias";
		}else{
			$response = date('d-M-Y', strtotime($date) );
		}
		return $response;
	}

	/**
	* [remove_accents description]
	* @param  [type] $string [description]
	* @return [type]         [description]
	*/
	function remove_accents($string){
		$string_final = str_replace(
  			array(
  				'á','à','ä','â','ª','Á','À','Â','Ä',
  				'é','è','ë','ê','É','È','Ê','Ë',
  				'í','ì','ï','î','Í','Ì','Ï','Î',
  				'ó','ò','ö','ô','Ó','Ò','Ö','Ô',
  				'ú','ù','ü','û','Ú','Ù','Û','Ü',
  				'ñ','Ñ','ç','Ç'),
  			array(
  				'a','a','a','a','a','A','A','A','A',
  				'e','e','e','e','E','E','E','E',
  				'i','i','i','i','I','I','I','I',
  				'o','o','o','o','O','O','O','O',
  				'u','u','u','u','U','U','U','U',
  				'n','N','c','C'),
  		$string
  		);
		return $string_final;
	}

	/**
	* [get_ip_current description]
	* @return [type] [description]
	*/
	function get_ip_current(){ return $_SERVER['REMOTE_ADDR']; }

	/**
	* 
	*/
	function get_date_current(){ date_default_timezone_set('America/Mexico_City'); return date('Y-m-d H:i:s'); }

	/**
	* [get_agent_current description]
	* @return [type] [description]
	*/
	function get_agent_current(){ return $_SERVER['HTTP_USER_AGENT']; }

	/**
	* [encryp_image_base64 description]
	* @param  [type] $path [description]
	* @return [type]       [description]
	*/
	function encryp_image_base64($path){
		// $type = pathinfo($path, PATHINFO_EXTENSION);
		// $data = file_get_contents($path);
		// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		return $path;
	}
?>