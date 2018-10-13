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
	$name = $_POST['username'];
	$email = $_POST['useremail'];
	$password = $_POST['userpassword'];
	$type = $_POST['usertype'];	
	// Instancing the UserDAO class, passing the values through the __construct.
	$u = new UserDAO($name,$email,$password,$type);
	// Acessing the create user method
	$u->createUser();
	// Printing the result
	echo "<h2>Usuário criado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	// Case update to update the user
	case 'update':
	// Getting the fields values using the $_POST
	$id = $_POST['userid'];
	$name = $_POST['username'];
	$email = $_POST['useremail'];
	$password = $_POST['userpassword'];
	$type = $_POST['usertype'];
	// Instancing the UserDAO class
	$u = new UserDAO();
	// Acessing the update user method
	$u->updateUser($id,$name,$email,$password,$type);
	// Printing the result
	echo "<h2>Usuário atualizado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	
	case 'delete':
	// Getting the id of the user using the superglobal $_GET
	$id = $_GET['userID'];
	// Instancing the UserDAO class
	$u = new UserDAO();
	// Acessing the deleteUser method
	$u->deleteUser($id);
	// Printing the result
	echo "<h2>Usuário deletado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;

	default:
	echo "Operação inválida!";
	break;
}

