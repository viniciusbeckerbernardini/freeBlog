<?php 
/**
* @author Vinícius Becker Bernardini
* @since 08/10/2018
*/

use \model\User as User;
use \DAO\User as UserDAO;

function create(){
	$name = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'useremail');
	$password = hash_hmac('sha256', filter_input(INPUT_POST, 'userpassword'), 'secret');
	$type = filter_input(INPUT_POST, 'usertype');

	$u = new User($name,$email,$password,$type);
	$uDAO = new UserDAO();
	$uDAO->createUser($u->getName(),$u->getEmail(),$u->getPassword(),$u->getUsertype());

	// Info : cu = create user
	header("Location: ".siteURL().'/list/user?info=cu');
}

function update(){
	$id = filter_input(INPUT_POST,'userid');
	$name = filter_input(INPUT_POST, 'username');
	$email = filter_input(INPUT_POST, 'useremail');
	$password = hash_hmac('sha256', filter_input(INPUT_POST, 'userpassword'), 'secret');
	$type = filter_input(INPUT_POST, 'usertype');
	
	$u = new User($name,$email,$password,$type,$id);
	$uDAO = new UserDAO();
	$uDAO->updateUser($u->getUserid(),$u->getName(),$u->getEmail(),$u->getPassword(),$u->getUsertype());

	// Info : uu  = updated user
	header("Location: ".siteURL().'/list/user?info=uu');
}

function delete(){
	$id = filter_input(INPUT_POST, 'userID');

	$u = new User();
	$u->setUserid($id);
	$uDAO = new UserDAO();
	$uDAO->deleteUser($u->getUserid());

	// Info : du  = delete user
	header("Location: ".siteURL().'/list/user?info=du');
}

function login(){
	$login = filter_input(INPUT_POST,"email");
	$password = filter_input(INPUT_POST, "password"); 

	$uDAO = new UserDAO();
	$result = $uDAO->login($login,$password);

	if($result){
		header("Location: ".siteURL().'/admin/panel');
	}else{
		header("Location: ".siteURL().'/admin');
	}
}

function logout(){
	session_destroy();
	header("Location: ".siteURL().'/');
}
