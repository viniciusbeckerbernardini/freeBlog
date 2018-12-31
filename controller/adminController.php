<?php 
/**
* Controller of login
* @author Vinícius Becker Bernardini
* @since 25/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Getting the operation
$operation = $_GET['operation'];
// Switch to the select operation

switch ($operation) {
	case 'login':
	//Getting the information 
	$login = $_POST['email'];
	$password = $_POST['password']; 
	$u = new UserDAO();
	$result = $u->login($login,$password);

	if($result){
		// var_dump($result);
		// var_dump($_SESSION['authUser']['login']);
		header("Location: ".siteURL().'/admin/panel');
	}else{
		// var_dump($result);
		header("Location: ".siteURL().'/admin');
	}
	break;
	
	case 'logout';
		session_destroy();
		header("Location: ".siteURL().'/');
	break;
	default:
		# code...
	break;
}


