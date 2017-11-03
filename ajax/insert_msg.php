<?php
require('../config/file_config_ajax.php');

// Creando objeto User
$user = new User;

//insert.php
if(isset($_POST['msg']) && isset($_POST['id'])){
	$data = array();
	$data['id_user'] = $_POST['id'];
	$data['msg'] = $_POST['msg'];
	$user->agregarMensaje($data);
}