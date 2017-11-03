<?php

// Se inicia sesión
// session_start();

// Se incluye archivo de configuración
require_once('config/config.php');

// Se incluye funciones de ayuda
require_once('helpers/system_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');

// Clases que se autocargan y que son creadas por el desarrollador
function __autoload($class_name){
	require_once('libs/' . $class_name . '.php');
}
