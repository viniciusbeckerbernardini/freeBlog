<?php 
/**
*@class SQL
*@author Vinícius Becker Bernardini
*@since 27/09/2018
*/
namespace Persistence;

use \PDO as PDO;

class SQL extends PDO{
	private $conn;
	public function __construct($host="localhost",$dbname="freeBlog",$user="root",$password=""){
		$this->conn = new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
	}

	public function setParameters($statements,$parameters =[]){
		foreach ($parameters as $key => $value) {
			$this->setParameter($statements,$key,$value);
		}
	}

	public function setParameter($statement,$key,$value){
		$statement->bindParam($key,$value);
	}

	public function query($rawQuery,$parameters = []){
		$statement = $this->conn->prepare("$rawQuery");
		$this->setParameters($statement,$parameters);
		$statement->execute();
		return $statement;
	}
}