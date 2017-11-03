<?php
require('core/init.php');

// Creando objeto User
$user = new User;
// Obteniendo la plantilla que se visualizará en index.php
$template = new Template('plantillas/ui_index.php');

if(isset($_POST['btn_iniciar'])){
	/*Se obtien la información del usuario inscrito para guardarlo en la bd*/
	date_default_timezone_set('America/Mexico_City');
	$timezone = date_default_timezone_get();
	// Creando arrar de datos para la BD
	$data = array();
	$data['nickname'] = $_POST['nickname'];
	if($user->registrarUsuarioNuevo($data)){
		$data['id_user'] = $user->obtIdUltimoUsuario($data);
		redireccionar('chat?u_l='.$data['id_user'], 'Inicio de sesión correcto.', 'exitoso', 'glyphicon glyphicon-ok', ':', '#');
	}else{
		redireccionar('index', 'Error en la conexión a la base de datos. Intenta más tarde.', 'error', 'glyphicon glyphicon-remove-sign', ' ', '#');
	}
}

$template->tab = "login";
$template->titulo_tab = "Inicio de Sesión | LiNuXiToS - Chat";
echo $template;