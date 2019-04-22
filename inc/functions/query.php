<?php 

use \Persistence\SQL as SQL;

function listAllFromTable($table){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM $table");
		$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $result;	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function listFieldFromTable($table,$field){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT $field FROM $table");
		$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $result;	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function getInfoByIdOfTable($table,$field){
	try {
		$id = filter_input(INPUT_GET,"id");
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM $table WHERE $field = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function getInfoByIdtoUpdatePost($id){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_CATEGORY WHERE category_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}