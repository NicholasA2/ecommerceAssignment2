<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		$host = 'localhost';
		$dbname = 'cliquebait';
		$user = 'root';
		$pass = '';

		try{
			$this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}catch(\Exception $e){
			echo "Failed connecting to the database";
			exit(0);
		}
	}
}