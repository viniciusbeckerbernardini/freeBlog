<?php
/**
* Category Controller
*@author Vinícius Becker Bernardini
*@since 05/10/2018
*@updated for filter_input in 28/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation){
	// Create case to register the category
	case 'create':
	// Getting the field category name using the superglobal $_POST 
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	// Instancing the CategoryDAO class, passing the category name to constructor
	$c = new CategoryDAO($categoryName);
	// Using the createCategory function
	$c->createCategory();
	// Redirecting to the panel and informing the category has been created
	// Info : cc = created category
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/categories/list-category.php?info=cc');
	break;
	// 	Update case to update the category
	case 'update':
	// Getting the category data using the $_POST
	$categoryID = filter_input(INPUT_POST, 'categoryid');
	$categoryName = filter_input(INPUT_POST, 'categoryname');
	// Instancing the Category Data Acess Object class
	$c = new CategoryDAO();
	// Acessing the update category method, passing the variables through him.
	$c->updateCategory($categoryID,$categoryName);
	// Redirecting to the panel and informing the category has been updated
	// Info : uc = updated category
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/categories/list-category.php?info=uc');
	break;
	// Delete case to delete the category
	case 'delete':
	// Getting the id using the superglobal $_GET
	$categoryID = filter_input(INPUT_GET, 'categoryID');
	// Instancing the Category DAO class
	$c = new CategoryDAO();
	// Acessing the deleteCategory method
	$c->deleteCategory($categoryID);
	// Redirecting to the panel and informing the category has been deleted
	// Info : dc = deleted category
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/categories/list-category.php?info=dc');
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	// Redirecting to the panel and informing the post has been created
	// Info : cp = created post
	// header("Location: ".siteURL().'/freeBlog/view/admin-pages/admin-login.php');
	break;
}
