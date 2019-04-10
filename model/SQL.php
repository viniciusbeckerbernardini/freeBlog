<?php 
/**
*@class SQL
*@author Vinícius Becker Bernardini
*@since 27/09/2018
*/
namespace model;
use \PDO as PDO;

class SQL extends PDO{
	// Creating the attributes 
	private $conn;
	// Extending the pdo here to connect in the database when we instance the class
	public function __construct($host="localhost",$dbname="freeBlog",$user="root",$password=""){
		$this->conn = new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
	}
	// Create a method to setParameters to make a database query
	public function setParameters($statements,$parameters =[]){
		// Making a foreach to send to function setParameter all parameters
		foreach ($parameters as $key => $value) {
			$this->setParameter($statements,$key,$value);
		}
	}
	// Creating a method to receive all parameters of the setParameters function
	public function setParameter($statement,$key,$value){
		$statement->bindParam($key,$value);
	}
	// Creating a method to receive the parameters and make a sql query
	public function query($rawQuery,$parameters = []){
		$statement = $this->conn->prepare("$rawQuery");
		$this->setParameters($statement,$parameters);
		$statement->execute();
		return $statement;
	}
}