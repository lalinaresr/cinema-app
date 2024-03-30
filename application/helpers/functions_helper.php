<?php

	/**
	* [detect_client description]
	* @return [type] [description]
	*/
	function detect_client(){
		$browsers = array(
			'IE',
			'OPERA',
			'MOZILLA',
			'NETSCAPE',
			'FIREFOX',
			'SAFARI',
			'CHROME'
		);

		$os = array(
			'WIN',
			'MAC',
			'LINUX'
		);
	 
		# definimos unos valores por defecto para el navegador y el sistema operativo
		$info['browsers'] = 'Other';
		$info['os'] = 'Other';
	 
		# buscamos el navegador con su sistema operativo
		foreach($browsers as $parent){
			$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
			$f = $s + strlen($parent);
			$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
			$version = preg_replace('/[^0-9,.]/','',$version);
			if ($s)	{
				$info['browsers'] = $parent;
				$info['version'] = $version;
			}
		}
	 
		# obtenemos el sistema operativo
		foreach($os as $val){
			if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
				$info['os'] = $val;
		}
	 
		# devolvemos el array de valores
		return $info;
	}

	/**
	* [get_age_exactly description]
	* @param  [type] $date_birthday [description]
	* @param  string $until_date    [description]
	* @return [type]                [description]
	*/
	function get_age_exactly($date_birthday, $until_date = 'ALL'){
		$date_birthday = new DateTime($date_birthday);
		$date_current = new DateTime("now");
		$difference = $date_birthday->diff($date_current);

		echo get_date_age($difference, $until_date);
	}

	/**
	* [get_date_age description]
	* @param  [type] $df         [description]
	* @param  [type] $until_date [description]
	* @return [type]             [description]
	*/
	function get_date_age($df, $until_date) {
	    $str = '';
	    $str .= ($df->invert == 1) ? ' - ' : '';
	    if ($df->y > 0) {
	        // years
	        $str .= ($df->y > 1) ? $df->y . ' Years ' : $df->y . ' Year ';
	    } if ($df->m > 0) {
	        // month
	        $str .= ($df->m > 1) ? $df->m . ' Months ' : $df->m . ' Month ';
	    } if ($df->d > 0) {
	        // days
	        $str .= ($df->d > 1) ? $df->d . ' Days ' : $df->d . ' Day ';
	    } if ($df->h > 0) {
	        // hours
	        $str .= ($df->h > 1) ? $df->h . ' Hours ' : $df->h . ' Hour ';
	    } if ($df->i > 0) {
	        // minutes
	        $str .= ($df->i > 1) ? $df->i . ' Minutes ' : $df->i . ' Minute ';
	    } if ($df->s > 0) {
	        // seconds
	        $str .= ($df->s > 1) ? $df->s . ' Seconds ' : $df->s . ' Second ';
	    }

	    switch ($until_date) {
	    	case 'ALL':
	    		echo $str;
	    		break;
	    	case 'YEARS':
	    		echo $df->y;
	    		break;
	    	case 'MONTHS':
	    		echo $df->m;
	    		break;
	    	case 'DAYS':
	    		echo $df->d;
	    		break;
	    	case 'HOURS':
	    		echo $df->h;
	    		break;
	    	case 'MINUTES':
	    		echo $df->i;
	    		break;
	    	case 'SECONDS':
	    		echo $df->s;
	    		break;
	    	default:
	    		echo $str;
	    		break;
	    }	    
	}   

	/**
	* [generate_password description]
	* @param  [type] $date_birthday [description]
	* @param  [type] $firstname     [description]
	* @param  [type] $lastname      [description]
	* @return [type]                [description]
	*/
	function generate_password($date_birthday, $firstname, $lastname){
		$date = new DateTime($date_birthday);
		$date_formatted = $date->format('d-m-Y');
				
		$year = substr($date_formatted, 8);
		$mounth = substr($date_formatted, 3, 2);
		$days = substr($date_formatted, 0, 2);
		return $days . '' . $mounth . '' . $year . '' . strtoupper($firstname[0]) . '' . strtoupper($lastname[0]);
	}	   

	/**
	* [what_day_is description]
	* @param  [type] $date_exactly [description]
	* @return [type]               [description]
	*/
	function what_day_is($date_exactly){
		$date = new DateTime($date_exactly);
		$date_formatted = $date->format('d-m-Y H:i:s');

		return date('d F Y', strtotime($date_formatted));
	}

	/**
	* [generate_extract description]
	* @param  [type] $text [description]
	* @return [type]       [description]
	*/
	function generate_extract($text, $length){
		$text_length = strlen($text);

		if($text_length > $length){
			$extract = substr($text, 0, $length);
			$extract .= '...';
		}else{
			$extract = $text;
		}
		return $extract;
	}

?>