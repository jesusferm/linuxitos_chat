<?php

/*
 * Formato de la fecha
 */
function formatDate($date){
	
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	$date = date("F j, Y, g:i a", strtotime($date));
	
	$arr = explode(' ',trim($date));

	switch ($arr[0]){
		case 'January':
			$mes = "1";
			break;
		case 'February':
			$mes = "2";
			break;
		case 'March':
			$mes = "3";
			break;
		case 'April':
			$mes = "4";
			break;
		case 'May':
			$mes = "5";
			break;
		case 'June':
			$mes = "6";
			break;
		case 'July':
			$mes = "7";
			break;
		case 'August':
			$mes = "8";
			break;
		case 'September':
			$mes = "9";
			break;
		case 'October':
			$mes = "10";
			break;
		case 'November':
			$mes = "11";
			break;
		case 'December':
			$mes = "12";
			break;
	}
	$dia = str_replace(',', '', $arr[1]);
	$anio = str_replace(',', '', $arr[2]);
	$fecha = $dia.'/'.$mes.'/'.$anio;
	return $fecha;
}


/*
 *	Formato de la URL
 */
function urlFormat($str){
	// Eliminar espacios
	$str = preg_replace('/\s*/', '', $str);
	// se convierte a minúsculas la cadena
	$str = strtolower($str);
	// codificación de la URL
	$str = urlencode($str);
	return $str;
}

/*
 * Agregar el nombre de la clase activa si la categoría está activa
 */
function is_active($category) {
	if(isset($_GET['category'])) {
		if ($_GET['category'] === $category) {
			return 'active';
		}else{
			return '';
		}
	}
}

function fecha_es_mexico($fecha){
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	echo $dias[date("w", strtotime($fecha))]." ".date("d", strtotime($fecha))." de ".$meses[date("n", strtotime($fecha))-1]. " de ".date(date("Y", strtotime($fecha))) ;
}

function nicetime($date){
    if(empty($date)) {
        return "Fecha no establecida";
    }
    
    $periods         = array("segundo", "minuto", "hora", "día", "semana", "mes", "año", "decada");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Error en la fecha";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "hace";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "{$tense} $difference $periods[$j]";
}