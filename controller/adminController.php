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
	var_dump($result);
	if($result == "false"){
		header("Location: ".siteURL().'/freeBlog/view/admin-pages/admin-login.php');
	}else{
		header("Location: ".siteURL().'/freeBlog/view/admin-pages/admin-panel.php');
	}
	break;
	
	case 'logout';

	break;
	default:
		# code...
	break;
}


