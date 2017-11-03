<?php

/**
 * [Función que redirige una página a otra, con mensajes, requiere recabar e la url message, tipo, icono, titulo, url]
 * @param  boolean $page         [description]
 * @param  [type]  $message      [description]
 * @param  [type]  $message_type [description]
 * @return [type]                [description]
 */
function redirect($page = FALSE, $message = NULL, $message_type = NULL){
	if(is_string ($page)){
		$location = $page;
	}else{
		$location = $_SERVER ['SCRIPT_NAME'];
	}

	// Check for the message
	if($message != NULL){
		// Set Message
		$_SESSION['message'] = $message;
	}
	// Check for type
	if($message_type != NULL){
		// Set message type
		$_SESSION['message_type'] = $message_type;
	}

	// Redireccionamiento
	header ('Location: ' .$location);
	exit;
}

/**
 * [Función que redirige una página a otra, con mensajes, requiere recabar e la url message, tipo, icono, titulo, url]
 * @param  boolean $page         [description]
 * @param  [type]  $message      [description]
 * @param  [type]  $message_type [description]
 * @return [type]                [description]
 */
function redireccionar($page = FALSE, $text_msg = NULL, $tipo_msg = NULL, $icono_msg = NULL, $titulo_msg  = NULL, $url_msg = NULL){
	if(is_string ($page)){
		$location = $page;
	}else{
		$location = $_SERVER ['SCRIPT_NAME'];
	}

	// Check for the message
	if($text_msg != NULL){
		// Set Message
		$_SESSION['text_msg'] = $text_msg;
	}
	// Check for type
	if($tipo_msg != NULL){
		// Set message type
		$_SESSION['tipo_msg'] = $tipo_msg;
	}

	if($icono_msg != NULL){
		// Set message type
		$_SESSION['icono_msg'] = $icono_msg;
	}

	if($titulo_msg != NULL){
		// Set message type
		$_SESSION['titulo_msg'] = $titulo_msg;
	}

	if($url_msg != NULL){
		// Set message type
		$_SESSION['url_msg'] = $url_msg;
	}

	// Redireccionamiento
	header ('Location: ' .$location);
	exit;
}

/**
 * [Función que envia un mensaje de notificación en pantalla, requiere de los siguientes datos
 * message, tipo, icono, titulo, url]
 * @return [type] [description]
 */
function mostrarMensaje(){
	if(!empty($_SESSION['text_msg'])){
		$message = $_SESSION['text_msg'];
		if(!empty($_SESSION['tipo_msg'])){
			$message_type = $_SESSION['tipo_msg'];
			$icono_msg = $_SESSION['icono_msg'];
			$titulo_msg = $_SESSION['titulo_msg'];
			$url_msg = $_SESSION['url_msg'];
			if ($message_type == 'error'){
				echo '<script language="javascript">mensaje("'.$message.'", "danger", "'.$icono_msg.'", "'.$titulo_msg.'", "#");</script>';
			}
			if ($message_type == 'exitoso'){
				echo '<script language="javascript">mensaje("'.$message.'", "success", "'.$icono_msg.'", "'.$titulo_msg.'", "#");</script>';
			}
			if ($message_type == 'advertencia'){
				echo '<script language="javascript">mensaje("'.$message.'", "success", "'.$icono_msg.'", "'.$titulo_msg.'", "#");</script>';
			}
			// Eliminar mensaje
			unset($_SESSION['text_msg']);
			unset($_SESSION['tipo_msg']);
		}else{
			echo '';
		}
	}
}

/**
 * [Función que envia un mensaje de notificación en pantalla, requiere de los siguientes datos
 * message, tipo, icono, titulo, url]
 * @return [type] [description]
 */
function displayMessage(){
	if(!empty($_SESSION['message'])){
		// Assign message to a variable
		$message = $_SESSION['message'];

		if(!empty($_SESSION['message_type'])){
			// Assign type to a variable
			$message_type = $_SESSION['message_type'];
			// Create output glyphicon 
			if ($message_type == 'error'){
				echo '<script language="javascript">mensaje("Error en el nombre de usuario o contraseña", "danger", "glyphicon glyphicon-warning-sign", "", "#");</script>';
				//echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$message.'</div>';
			}else{
				echo '<script language="javascript">mensaje("Has iniciado sesión.", "success", "glyphicon glyphicon-ok-sign", "", "#");</script>';
				//echo '<div class="alert alert-success"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' . $message . '</div>';
			}
			// Eliminar mensaje
			unset($_SESSION['message']);
			unset($_SESSION['message_type']);
		}else{
			echo '';
		}
	}
}

/*
 * Verifica si existe una sesión iniciada.
 */
function isLoggedIn(){
	if(isset($_SESSION['is_logged_in'])){
		return true;
	}else{
		return false;
	}
}


/*
 * Retorna datos del usuario, el id_user, usarname, name
 */
function getUser(){
	$userArray = array();
	$userArray['user_id'] = $_SESSION['user_id'];
	$userArray['username'] = $_SESSION['username'];
	$userArray['name'] = $_SESSION['name'];
	$userArray['contrasenia'] = $_SESSION['contrasenia'];
	$userArray['acercade'] = $_SESSION['acercade'];
	$userArray['email'] = $_SESSION['email'];
	return $userArray;
}


/*
 * Verifica si el usuario logeado es administrador
 */
function isAdmin(){
	if(isset($_SESSION['es_admin'])){
		if($_SESSION['es_admin']==1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

/**
 * [retorna el id del usuario que haya iniciado sesión]
 * @return [type] [retorna un entero]
 */
function obtIdUser(){
	if(isset($_SESSION['user_id'])){
		return $_SESSION['user_id'];
	}else{
		return false;
	}
}

function getRealIpAddr(){
	if (getenv('HTTP_CLIENT_IP')) {
		$ip = getenv('HTTP_CLIENT_IP');
	}elseif (getenv('HTTP_X_FORWARDED_FOR')) {
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}elseif (getenv('HTTP_X_FORWARDED')) {
		$ip = getenv('HTTP_X_FORWARDED');
	}elseif (getenv('HTTP_FORWARDED_FOR')) {
		$ip = getenv('HTTP_FORWARDED_FOR');
	}elseif (getenv('HTTP_FORWARDED')) {
		$ip = getenv('HTTP_FORWARDED');
	}else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function getIpPublic(){
	$ip = file_get_contents('https://api.ipify.org');
	return $ip;
}

function getFechaMexico(){
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();
	return date("Y-m-d H:i:s");
}

function getFechaMexicoYmd(){
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();
	return date("Y-m-d");
}

function esFechaIgualHoy($fecha){
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();
	$hoy = date('Y-m-d', time());

	$time = strtotime($fecha);
	$newformat = date('Y-m-d',$time);

	//$fecha = date('Y-m-d', $fecha);
	if ($hoy===$newformat) {
		return true;
	}else{
		return false;
	}
}

function getNameMachine(){
	return gethostname();
}

function esCerradoTema($fecha_cierre){
	$cerrado = true;
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();

	$hoy = date('Y-m-d', time());
	$creado = strtotime($hoy);
	$cierre = strtotime($fecha_cierre);

	if($creado<$cierre){
		$cerrado = false;
	}

	return $cerrado;
}

function fechaVenceMayorAhoy($fecha){
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();
	$hoy = date('Y-m-d', time());

	$time = strtotime($fecha.' +1 day');
	$vence = date('Y-m-d',$time);

	//$fecha = date('Y-m-d', $fecha);
	if ($vence<=$hoy) {
		return true;
	}else{
		return false;
	}
}

function getFechaCreado($creado){
	$arr = explode(' ', trim($creado));
	$arr1 = explode('-', trim($arr[0]));
	$anio = $arr1[0];
	$mes = $arr1[1];
	$dia = $arr1[2];
	return $fecha=($dia.'/'.$mes.'/'.$anio);
}

function getFechaCierre($fecha){
	$arr = explode('-', trim($fecha));
	$anio = $arr[0];
	$mes = $arr[1];
	$dia = $arr[2];
	echo $dia.'/'.$mes.'/'.$anio;
}

function getFechaCreadoBD($creado){
	$arr = explode(' ', trim($creado));
	$arr1 = explode('-', trim($arr[0]));
	$anio = $arr1[0];
	$mes = $arr1[1];
	$dia = $arr1[2];
	return $fecha=($anio.'-'.$mes.'-'.$dia);
}

function clean_string($string) {
	$bad = array("content-type","bcc:","to:","cc:","href");
	return str_replace($bad,"",$string);
}

function enviarMail($solicitante, $email, $asunto, $email_area, $mensaje){
	//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo
	//$email_message = "Contenido del Mensaje.\n\n";
	//$email_message .= "Nombre: ".clean_string($solicitante)."\n";
	//$email_message .= "Email: ".clean_string($email)."\n";
	//$email_message .= "Asunto: ".clean_string($asunto)."\n";
	//$email_message .= "Mensaje: ".clean_string($mensaje)."\n";
	//Se crean los encabezados del correo
	$headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n" .'X-Mailer: PHP/' . phpversion();
	@mail($email_area, $asunto, $mensaje, $headers);
}

function fraseAleatoria($length=8){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function count_file_path($path){
	//$path = "../images/sliders";
	$d = dir($path);
	$totalfiles=0;
	while (false !== ($entry = $d->read())){
		$filepath = "{$path}/{$entry}";
		$latest_filename = $entry;
		if($latest_filename != "." && $latest_filename != "..") {
			$totalfiles=$totalfiles+1;
		}
	}
	return $totalfiles;
}

/**
 * [name_file_path retorna un array con los nombres de los archivos dentro de la ruta que se le indique]
 * @param  [type] $path [description]
 * @return [type]       [description]
 */
function name_file_path($path){
	//$path = "../images/sliders";
	//$pathdefault = "images/sliders/";
	$d = dir($path);

	$namefiles = array();
	$i=0;
	while (false !== ($entry = $d->read())){
		$filepath = "{$path}/{$entry}";
		$latest_filename = $entry;
		if($latest_filename != "." && $latest_filename != "..") {
			$namefiles[$i] = $entry;
			//$latest_filename = $entry;
			//echo "$latest_filename<br/>";
			//$totalfiles=$totalfiles+1;
			$i=$i+1;
		}
	}
	return $namefiles;
}

/**
 * [getFirstFileDirectory devuelve el nombre del primer archivo dentro de un directorio, no valida que exista al menos un archivo dentro del directorio, asume que siempre habrá al menos uno]
 * @param  [type] $ruta [description]
 * @return [type]       [description]
 */
function getFirstFileDirectory($ruta){
	$dir = dir($ruta);
	$namefiles = array();
	$namefiles = name_file_path($ruta);

	return $namefiles[0];
}

function obtIconArchivo($ext) {
	$icon = "fa fa-file";
	switch ($ext) {
		case 'pdf':
			$icon = " fa fa-file-pdf-o ";
			break;
		case 'doc':
			$icon = " fa fa-file-word-o ";
			break;
		case 'mp3':
			$icon = " fa fa-file-audio-o ";
			break;
		case 'docx':
			$icon = " fa fa-file-word-o ";
			break;
		case 'xls':
			$icon = " fa fa-file-excel-o ";
			break;
		case 'xlsx':
			$icon = " fa fa-file-excel-o ";
			break;
		case 'txt':
			$icon = " fa fa-file-text-o ";
			break;
		case 'ppt':
		case 'pptx':
			$icon = " fa fa-file-powerpoint-o ";
			break;
		case 'jpg':
		case 'jpeg':
		case 'png':
			$icon = " fa fa-file-image-o ";
			break;
		default:
			$icon = " fa fa-file-text-o ";
			break;
	}
	return $icon;
}