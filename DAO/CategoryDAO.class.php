<?php
/**
*@classname CategoryDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
// Creating Data Acess Object of Category
class CategoryDAO extends Category{
	// Making create category
	public function createCategory(){
		try{
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_CATEGORY (category_name)
				VALUES (:NAME)",
				array(":NAME"=>$this->getName())
			);
		}
		catch(Exception $e){
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making update category
	public function updateCategory($id,$name){
		try {
			$this->setCategoryid($id);
			$this->setName($name);
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_CATEGORY SET category_name = :NAME
				WHERE category_id = :ID",
				array(":NAME"=>$this->getName(),
					":ID"=>$this->getCategoryid())
			);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Making delete category
	public function deleteCategory($id){
		try {
			$this->setCategoryId($id);
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_CATEGORY WHERE category_id = :ID ",
				array(":ID"=>$this->getCategoryid()));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating list function
	public function listCategory(){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_CATEGORY");
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating getInfoById function
	function getInfoById(){
		try {
			$id = $_GET['id'];
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
	// Creating the function to get the category information to update the post
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
}
