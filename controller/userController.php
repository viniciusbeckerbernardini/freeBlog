<?php 
/**
* User Controller
* @author Vinícius Becker Bernardini
* @since 08/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
use \model\User as User;
use \DAO\User as UserDAO;
// Getting the operation using $_GET
$operation = filter_input(INPUT_GET, 'operation');
// Using the switch to get the request operation
switch ($operation) {
	// Case create to create the user
	case 'create':
	// Getting the fields values using the $_POST
	$name = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'useremail');
	$password = hash_hmac('sha256', filter_input(INPUT_POST, 'userpassword'), 'secret');
	$type = filter_input(INPUT_POST, 'usertype');
	// Instancing the UserDAO class, passing the values through the __construct.
	$u = new User($name,$email,$password,$type);
	$uDAO = new UserDAO();
	// Acessing the create user method
	$uDAO->createUser($u->getName(),$u->getEmail(),$u->getPassword(),$u->getUsertype());
	// Redirecting to the panel and informing the user has been created
	// Info : cu = create user
	header("Location: ".siteURL().'/list/user?info=cu');
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
	$u = new User($name,$email,$password,$type,$id);
	$uDAO = new UserDAO();
	// Acessing the update user method
	$uDAO->updateUser($u->getUserid(),$u->getName(),$u->getEmail(),$u->getPassword(),$u->getUsertype());
	// Redirecting to the panel and informing the user has been updated
	// Info : uu  = updated user
	header("Location: ".siteURL().'/list/user?info=uu');
	break;
	
	case 'delete':
	// Getting the id of the user using the superglobal $_GET
	$id = filter_input(INPUT_GET, 'userID');
	// Instancing the UserDAO class
	$u = new User("","","","",$id);
	$uDAO = new UserDAO();
	// Acessing the deleteUser method
	$uDAO->deleteUser($u->getUserid());
	// Redirecting to the panel and informing the user has been deleted
	// Info : du  = delete user
	header("Location: ".siteURL().'/list/user?info=du');
	break;
	// If get invalid operation	
	default:
	// Print error message
	echo "Operação inválida!";
	break;
}

