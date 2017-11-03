<?php
class User{
	// Inicializando db
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function registrarUsuarioNuevo($data){
		// Insertando Query
		$this->db->query('CALL agregarUsuarioNuevo(:nickname);');

		// Bind Values
		$this->db->bind(':nickname', $data['nickname']);

		// Execute
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function obtInfoUsuario($data){
		// Insertando consulta
		$db = new Database;
		$db->query("CALL obtInfoUsuario(:id_user);");
		// Publicando valores
		$db->bind(':id_user', $data['id_user']);

		$row = $db->single();
		$db = null;
		return $row;
	}

	public function agregarMensaje($data){
		// Insertando Query
		$this->db->query('CALL agregarMensaje(:id_user, :msg);');

		// Bind Values
		$this->db->bind(':id_user', $data['id_user']);
		$this->db->bind(':msg', $data['msg']);

		// Execute
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function obtIdUltimoUsuario($data){
		$db =  new Database;
		$db->query("CALL obtIdUltimoUsuario(lower(:nickname));");
		$db->bind(':nickname', $data['nickname'], PDO::PARAM_STR, 300);

		$rows = $db->resultset();
		$total = 0;
		foreach ($rows as $val){
			$total = $val->id_user;
		}
		$db = null;
		return $total;
	}

	public function seleccionarTodosMensajes($data){
		$db =  new Database;
		$db->query("CALL seleccionarTodosMensajes(:limite);");
		$db->bind(':limite', $data['limite'], PDO::PARAM_INT);

		// Asignando los resultados al arreglo
		$results = $db->resultset();
		$db = null;
		return $results;
	}
}
