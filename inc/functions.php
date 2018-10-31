<?php 
/**
This is te freeBlog functions file
DON'T EDIT IF YOU DONT KNOW!
**/
// Creating the autoload function
function loadClass($className){
	// Creating array with all possible paths
	$filename = [
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".class.php",
		"DAO".DIRECTORY_SEPARATOR.$className.".class.php"
	];
	// Get the number os rows of the filename array
	$filenameCount = count($filename);
	// Creating a for to request the file if he exists
	for ($i=0; $i < $filenameCount ; $i++) {
		if(file_exists($filename[$i])){
			require_once($filename[$i]);
		} 
	}
}
// Using the spl function to register the function below
spl_autoload_register('loadClass');
// Rotine to get the site name 
function siteURL(){
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$domainName = $_SERVER['HTTP_HOST'].'/freeBlog';
	echo $protocol.$domainName;
}
// Function to verify is the user is authenticate
function verifyAuthUser(){
	session_regenerate_id();
	if(isset($_SESSION['authUser'])){
		$isAuth = $_SESSION['authUser'];
	}else{
		$isAuth = "false";	
	}
	if($isAuth == "true"){
		return true;
	}else{
		return false;
	}
}