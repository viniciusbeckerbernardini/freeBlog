<?php
/**
*@classname CategoryDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Category
class CategoryDAO extends Category{
	// Making create category
	public function createCategory(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("INSERT INTO tb_category (name)
			VALUES (:NAME)",
		array(":NAME"=>$this->getName())
		);
	}
}
