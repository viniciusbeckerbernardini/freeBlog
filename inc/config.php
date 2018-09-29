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
spl_autoload_register(function($className){
	$filename = array(
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."model".DIRECTORY_SEPARATOR.$className.".class.php",
		"..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".php",
		"..".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR.$className.".php",
		"model".DIRECTORY_SEPARATOR.$className.".class.php",
		"DAO".DIRECTORY_SEPARATOR.$className.".php"
	);
	if(file_exists($filename[0])){
		require_once($filename[0]);
	}else if(file_exists($filename[1])){
		require_once($filename[1]);
	}else if(file_exists($filename[2])){
		require_once($filename[2]);
	}else if(file_exists($filename[3])){
		require_once($filename[3]);
	}else if(file_exists($filename[4])){
		require_once($filename[4]);
	}else if(file_exists($filename[5])){
		require_once($filename[5]);
	}	else{
		throw new Exception("Classe $className não encontrada nos endereços $filename[0], $filename[1], $filename[2], $filename[3], $filename[4], $filename[5]");
		
	}
});
// Require the header.php

?>