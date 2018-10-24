<?php 
/**
This is te freeBlog configuration file
DON'T EDIT IF YOU DONT KNOW!
**/
// Development show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Making session start for every single file
session_start();
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
?>
