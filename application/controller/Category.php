<?php
/**
*@author Vinícius Becker Bernardini
*@since 05/10/2018
*/

use \model\Category as Category;
use \DAO\Category as CategoryDAO;


function create(){
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	try {
		$c = new Category($categoryName);
		$cDAO = new CategoryDAO();
		$cDAO->createCategory($c->getName());

		// Info : cc = created category
		header("Location: ".siteURL().'/list/category?info=cc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}


function update(){
	$categoryID = filter_input(INPUT_POST, 'categoryid');
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	try {
		$c = new Category($categoryName,$categoryID);
		$cDAO = new CategoryDAO();
		$cDAO->updateCategory($categoryID,$categoryName);

		// Info : uc = updated category
		header("Location: ".siteURL().'/list/category?info=uc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}


function delete(){
	$categoryID = filter_input(INPUT_POST, 'categoryID');
	try {
		$c = new Category();
		$c->setCategoryId($categoryID);
		$cDAO = new CategoryDAO();
		$cDAO->deleteCategory($categoryID);

		// Info : dc = deleted category
		header("Location: ".siteURL().'/list/category?info=dc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

