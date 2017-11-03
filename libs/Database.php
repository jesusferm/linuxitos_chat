<?php

/* Archivo libs/Database.php
 * Clase que maneja la
 * conexión  y comunicación con la
 * base de datos.
 */

class Database {
	// Datos de acceso de la base de datos de MySQL
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;
	private $dbport = DB_PORT;

	/* Otras variables:
	* $dbh -> Database Handler
	* $error -> Error Handler
	* $stmt -> statement
	*/
	private $dbh;
	private $error;
	private $stmt;

	// Creando conexión:
	public function __construct(){
		// fijar DNS:
		$dns = 'mysql:host=' .  $this->host.';port='.$this->dbport.';dbname=' . $this->dbname;
		// Estableciendo opciones:
		//PDO::ATTR_PERSISTENT => false,
		$options = array (
			PDO::ATTR_PERSISTENT => false,
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		// Creando nueva instancia del objeto:
		try{
			$this->dbh = new PDO ($dns, $this->user, $this->pass, $options);
		}catch (PDOException $e){
			$this->error = $e->getMessage();
			//print "Error en la conexión!: " . $e->getMessage() . "<br>";
			header('location: bd_error.html');
			die();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
		if (is_null($type)){
			switch(true){
				case is_int ($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool ($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null ($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue ( $param, $value, $type );
	}

	public function execute(){
		return $this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	public function rowCount(){
		return $this->stmt->rowCount();
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

	public function beginTransaction(){
		return $this->dbh->beginTransaction();
	}

	public function endTransaction(){
		return $this->dbh->commit();
	}

	public function cancelTransaction(){
		return $this->dbh->rollBack();
	}
}