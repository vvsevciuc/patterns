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
	
	public function getOneUser($id){
		$sql = $this->instance->query("Select * from main where main.id = $id");
		$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		if (empty($array)) {
			return false;
		} 
		return true;
	}
	
	public function insertUser($data){
		$sql = "INSERT INTO main (user, email) VALUES (:name, :email)";
		$stmt= $this->instance->prepare($sql);
		$result = $stmt->execute($data);
		if ($result == false) {
            echo 'Error: not inserted';
            return false;
        } else {
            return true;
        }
	}
	
	public function deleteUser($id){
		$result = $this->instance->query("Delete from main where main.id = $id");
		if ($result == false) {
            echo 'Error: cannot delete id ' . $id;
            return false;
        } else {
            return true;
        }
	}
	
}
