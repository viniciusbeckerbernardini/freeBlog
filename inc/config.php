<?php 
/**
This is te freeBlog configuration file
DON'T EDIT IF YOU DONT KNOW!
**/
// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Making session start for every file
session_start();
// Creatring the spl register for autoload
// Using a unamed function
spl_autoload_register('loadClass');

function loadClass($className){
	$filename = [
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".php",
		"..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".php",
		"model".DIRECTORY_SEPARATOR.$className.".class.php",
		"DAO".DIRECTORY_SEPARATOR.$className.".php"
	];
	$i = 0;
	do{
		if(file_exists($filename[$i])){
			require_once($filename[$i]);
		}
	}while($i = 5 && file_exists($filename[$i]));
}
// Require the header.php
?>