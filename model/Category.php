<?php
/**
*@class Category
*@author Vinícius Becker Bernardini
*/

class Category{
	// Creating the atributes
	private $categoryId;
	private $name;

	// Creating the constructor
	public function __construct($name = "",$id = 0){
		$this->setName($name);
		$this->setCategoryId($id);
	}
	// Creating the destructor
	public function __destruct(){
		$this->setCategoryId(-1);
		$this->setName("");

	}
	// Getters and Setters methods
	// Getter of category id
	public function getCategoryId():int{
		return $this->categoryId;
	}
	// Setter of category id
	public function setCategoryId(int $value){
		$this->categoryId = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}

	// Category tooString
	public function __toString(){
		return nl2br(
		"ID da categoria: ".getCategoryId().
		"Nome da categoria: ".getName());
	}

}
