<?php
/**
*@classname CategoryDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Category
class CategoryDAO extends Category{
	// Making create category
	public function createCategory(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO fb_category (category_name)
			VALUES (:NAME)",
			array(":NAME"=>$this->getName())
		);
	}
	// Making update category
	public function updateCategory($id,$name){
		$this->setCategoryid($id);
		$this->setName($name);
		$sql = new SQL();
		$statement = $sql->query("UPDATE fb_category SET category_name = :NAME
			WHERE category_id = :ID",
			array(":NAME"=>$this->getName(),
				":ID"=>$this->getCategoryid())
		);
	}

	// Making delete category
	public function deleteCategory($id){
		$this->setCategoryid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE FROM fb_category WHERE category_id = :ID ",
			array(":ID"=>$this->getCategoryid()));
	}

	// Creating list function
	public function listCategory(){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM fb_category");
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	// Creating getInfoById function
	function getInfoById(){
		$id = $_GET['id'];
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM fb_category WHERE category_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
	}
}
