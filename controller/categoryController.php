<?php
/**
* Category Controller
*@author Vinícius Becker Bernardini
*@since 05/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation){
	// Create case to register the category
	case 'create':
	// Getting the field category name using the superglobal $_POST 
	$categoryName = $_POST['categoryname'];
	// Instancing the CategoryDAO class, passing the category name to constructor
	$c = new CategoryDAO($categoryName);
	// Using the createCategory function
	$c->createCategory();
	// Print result
	echo "<h2>Categoria criada!</h2>";
	echo '<br>';
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	// 	Update case to update the category
	case 'update':
	$categoryName = $_POST['categoryname'];
	$c = new CategoryDAO();
	$c->updateCategory($categoryName);
	echo "<h2>Categoria atualizada!</h2>";
	echo '<br>';
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;

	case 'delete':
	$categoryName = $_POST['categoryname'];
	$c = new CategoryDAO();
	$c->deleteCategory($categoryName);
	echo "<h2>Categoria excluida!</h2>";
	echo '<br>';
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
}
