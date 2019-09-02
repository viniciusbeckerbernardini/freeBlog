<?php
/**
*@classname CategoryDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/

namespace DAO;

use \Persistence\SQL as SQL;

class Category{
	public function createCategory($name){
		try{
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_CATEGORY (category_name)
				VALUES (:NAME)",
				array(":NAME"=>$name)
			);
		}
		catch(Exception $e){
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	public function updateCategory($id,$name){
		try {
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_CATEGORY SET category_name = :NAME
				WHERE category_id = :ID",
				array(":NAME"=>$name,
					":ID"=>$id)
			);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	public function deleteCategory($id){
		try {
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_CATEGORY WHERE category_id = :ID ",
				array(":ID"=>$id));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
}
