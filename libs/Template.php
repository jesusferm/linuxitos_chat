<?php
/*
 * Clase 'libs/Template.php'
 * Crea el objeto vista
 */

class Template{
	// Variable para el objeto Template:
	protected $template;
	// Variable que se recibe:
	protected $vars = array();

	/*
	* Constructor de la clase:
	*/

	public function __construct($template){
		$this->template = $template;
	}

	/*
	* Obtiene las variables de template
	*/

	public function __get($key){
		return $this->vars($key);
	}

	/*
	* Se establecen las variables de template
	*/

	public function __set($key, $value){
		$this->vars[$key] = $value;
	}

	/*
	*  Convierte el objeto a cadena
	*/

	public function __toString(){
		extract($this->vars);
		chdir(dirname($this->template));
		ob_start();
		include basename($this->template);
		return ob_get_clean();
	}
}