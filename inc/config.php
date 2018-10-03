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
// Function to get the informations by id 
function getInfoById(){
	$id = $_GET['id'];
	$sql = new SQL();
	$statement = $sql->query("SELECT * FROM tb_projects WHERE project_id = :ID",
		array(":ID"=>$id)
	);
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result[0];
}
?>