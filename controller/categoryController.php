<?php
/**
* Category Controller
*@author Vinícius Becker Bernardini
*@since 05/10/2018
*@updated for filter_input in 28/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
use \model\Category as Category;
use \DAO\Category as CategoryDAO;
// Using the $_GET to get the operation request
$operation = filter_input(INPUT_GET,"operation");
switch ($operation){
	// Create case to register the category
	case 'create':
	// Getting the field category name using the superglobal $_POST 
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	// Instancing the CategoryDAO class, passing the category name to constructor
	try {
		$c = new Category($categoryName);
		$cDAO = new CategoryDAO();
		// Using the createCategory function
		$cDAO->createCategory($c->getName());
		// Redirecting to the panel and informing the category has been created
		// Info : cc = created category
		header("Location: ".siteURL().'/list/category?info=cc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
	break;
	// 	Update case to update the category
	case 'update':
	// Getting the category data using the $_POST
	$categoryID = filter_input(INPUT_POST, 'categoryid');
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	try {
		// Instancing the Category Data Acess Object class
		$c = new Category($categoryName,$categoryID);
		$cDAO = new CategoryDAO();
		// Acessing the update category method, passing the variables through him.
		$cDAO->updateCategory($categoryID,$categoryName);
		// Redirecting to the panel and informing the category has been updated
		// Info : uc = updated category
		header("Location: ".siteURL().'/list/category?info=uc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
	break;
	// Delete case to delete the category
	case 'delete':
	// Getting the id using the superglobal $_GET
	$categoryID = filter_input(INPUT_GET, 'categoryID');
	try {
		// Instancing the Category DAO class
		$c = new Category("",$categoryID);
		$cDAO = new CategoryDAO();
		// Acessing the deleteCategory method
		$cDAO->deleteCategory($categoryID);
		// Redirecting to the panel and informing the category has been deleted
		// Info : dc = deleted category
		header("Location: ".siteURL().'/list/category?info=dc');
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	header("Location: ".siteURL());
	// Redirecting to the panel and informing the post has been created
	// Info : cp = created post
	// header("Location: ".siteURL().'/freeBlog/view/admin-pages/admin-login.php');
	break;
}
