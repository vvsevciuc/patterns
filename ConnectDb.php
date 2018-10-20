<?php
class ConnectDb {
  
	private static $instance = null;
  
	public function __construct(){
	}
	private function __clone () {}
	private function __wakeup () {}
  
	public static function getInstance()
	{
		if(!self::$instance)
		{
		  self::$instance = new PDO("mysql:host=localhost;
			dbname=patterns", "root","",
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}
		return self::$instance;
  }

}


