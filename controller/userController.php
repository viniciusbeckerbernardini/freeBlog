<?php 
/**
* User Controller
* @author Vinícius Becker Bernardini
* @since 08/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Getting the operation using $_GET
$operation = $_GET['operation'];
// Using the switch to get the request operation
switch ($operation) {
	// Case create to create the user
	case 'create':
	// Getting the fields values using the $_POST
	$name = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'useremail');
	$password = filter_input(INPUT_POST, 'userpassword');
	$type = filter_input(INPUT_POST, 'usertype');
	// Instancing the UserDAO class, passing the values through the __construct.
	$u = new UserDAO($name,$email,$password,$type);
	// Acessing the create user method
	$u->createUser();
	// Redirecting to the panel and informing the user has been created
	// Info : cu = create user
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/users/list-users.php?info=cu');
	break;
	// Case update to update the user
	case 'update':
	// Getting the fields values using the $_POST
	$id = filter_input(INPUT_POST,'userid');
	$name = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'useremail');
	$password = filter_input(INPUT_POST, 'userpassword');
	$type = filter_input(INPUT_POST, 'usertype');
	// Instancing the UserDAO class
	$u = new UserDAO();
	// Acessing the update user method
	$u->updateUser($id,$name,$email,$password,$type);
	// Redirecting to the panel and informing the user has been updated
	// Info : uu  = updated user
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/users/list-users.php?info=uu');
	break;
	
	case 'delete':
	// Getting the id of the user using the superglobal $_GET
	$id = filter_input(INPUT_GET, 'userID');
	// Instancing the UserDAO class
	$u = new UserDAO();
	// Acessing the deleteUser method
	$u->deleteUser($id);
	// Redirecting to the panel and informing the user has been deleted
	// Info : du  = delete user
	header("Location: ".siteURL().'/freeBlog/view/admin-pages/users/list-users.php?info=du');
	break;
	// If get invalid operation	
	default:
	// Print error message
	echo "Operação inválida!";
	break;
}

