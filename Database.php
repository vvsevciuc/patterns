<?php


Class Database {
	public $instance = null;
	public function __construct(){
		$this->instance = ConnectDb::getInstance();
		
	}
	
	public function getAll(){
		$result = $this->instance->query('Select * from main');
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function insert(){
		$result = $this->instance->query('Insert * from main');
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function deleteUser($id){
		$sql = $this->instance->query("Delete from main where main.id = $id");
		$this->instance->exec($sql);
	}
	
}
