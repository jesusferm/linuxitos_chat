<?php
require('../config/file_config_ajax.php');

// Creando objeto User
$user = new User;
$data = array();
$data['limite'] = 10;
$mensajes = $user->seleccionarTodosMensajes($data);
$id_user = !empty($_GET['i_t'])?$_GET['i_t']:"0";
ini_set('date.timezone', 'America/Mexico_City');
if ($mensajes) {
	foreach ($mensajes as $msg) {
		if ($id_user==$msg->id_user) {
			echo '<li class="right clearfix">
					<span class="chat-img pull-right">
						<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
					</span>
					<div class="chat-body clearfix">
						<div class="header">
							<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'.nicetime($msg->fecha_creado).'</small>
							<strong class="pull-right primary-font">'.$msg->nickname.'</strong>
						</div>
						<p>
							'.$msg->mensaje.'
						</p>
					</div>
				</li>';
		}else{
			echo '<li class="left clearfix">
				<span class="chat-img pull-left">
					<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
				</span>
				<div class="chat-body clearfix">
					<div class="header">
						<strong class="primary-font">'.$msg->nickname.'</strong> <small class="pull-right text-muted">
							<span class="glyphicon glyphicon-time"></span>'.nicetime($msg->fecha_creado).'</small>
					</div>
					<p>
						'.$msg->mensaje.'
					</p>
				</div>
			</li>';
		}
	}
}else{
	echo "<p> Sala de chat sin mensajes. </p>";
}