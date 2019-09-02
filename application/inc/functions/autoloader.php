<?php 

function loadClass($className){
	$className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
	$filename = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$className.".php";

	if(file_exists($filename)){
		require_once($filename);
	}
}

spl_autoload_register('loadClass');