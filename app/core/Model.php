<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		$server = 'localhost';
		$dbname = 'cliquebait';
		$username = 'root';
		$password = '';

		try{
			$this->connection = new \PDO("mysql:host=$server;dbname=$dbname", $username, $password);
		}catch(\Exception $e){
			echo "Failed connecting to the database";
			exit(0);
		}
	}
}