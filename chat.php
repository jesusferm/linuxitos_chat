<?php
require('core/init.php');

$user = new User;

// Obteniendo la plantilla que se visualizará en index.php
$template = new Template('plantillas/ui_chat.php');

$data['id_user'] = !empty($_GET['u_l'])?$_GET['u_l']:0;

if ($data['id_user']>0) {
	$info_usuario = $user->obtInfoUsuario($data);
	$data['nickname'] = $info_usuario->nickname;
	// Asignando las variables
	$template->tab = "sala_chat";
	$template->id_user = $data['id_user'];
	$template->nickname = $data['nickname'];
	$template->titulo_tab = "Sala del Chat";

	// Visualizando la plantilla
	echo $template;
}else{
	redireccionar('index', 'Por favor ingrese un nombre de usuario.', 'error', 'glyphicon glyphicon-remove-sign', ' ', '#');
}