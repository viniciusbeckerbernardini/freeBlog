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
	$domainName = $_SERVER['HTTP_HOST'];
	echo $protocol.$domainName;
}

// Function to create the slugs
function createSlug($slug) {
	$map = array(
		'á' => 'a',
		'à' => 'a',
		'ã' => 'a',
		'â' => 'a',
		'é' => 'e',
		'ê' => 'e',
		'í' => 'i',
		'ó' => 'o',
		'ô' => 'o',
		'õ' => 'o',
		'ú' => 'u',
		'ü' => 'u',
		'ç' => 'c',
		'Á' => 'A',
		'À' => 'A',
		'Ã' => 'A',
		'Â' => 'A',
		'É' => 'E',
		'Ê' => 'E',
		'Í' => 'I',
		'Ó' => 'O',
		'Ô' => 'O',
		'Õ' => 'O',
		'Ú' => 'U',
		'Ü' => 'U',
		'Ç' => 'C',
		' ' => '-',
		'-' => '-',
		'!' => '',
		',' =>'',
		'?' => '',
		'.' => ''
	);
	return strtolower(strtr($slug, $map));
}

// Function to verify is the user is authenticate
function verifyAuthUser(){
	// Regenerating the id every new page
	session_regenerate_id();
	// Verifying is the session variable exists
	if(isset($_SESSION['authUser'])){
		$login = $_SESSION['authUser']['login'];
		$password = $_SESSION['authUser']['password'];
		// Calling the SQL class
		$sql = new SQL();
		// Making the statement
		$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
			array(
				':EMAIL'=>$login,
				':PASSWORD'=>$password
			));
		// Getting the result
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if($result != null){
			return true;
		}else if ($result == null){
			return false;	
		}
	}
}

function itemID(){
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		return $id;
	}
}

// Route function to all the system pages
function router(){
	// GET the uri of the site
	$uri = $_SERVER['REQUEST_URI'];
	// GET the method of the site
	$method = $_SERVER['REQUEST_METHOD'];
	// If is a get method requested
	if($method == "GET"){
		switch($uri){
			// Root
			case '/':
			require_once("view/index.php");
			break;
			// Admin login
			case "/admin":
			require_once("view/admin-pages/admin-login.php");
			break;
			case "/admin/":
			require_once("view/admin-pages/admin-login.php");
			break;
			// Admin panel
			case "/admin/panel":
			require_once("view/admin-pages/admin-panel.php");
			break;

			case "/admin/logout":
			header("Location:".siteURL()."/controller/adminController.php?operation=logout");
			// Blog
			case "/blog":
			require_once("view/blog.php");
			break;


			// Categories
			// Create category case
			case "/create/category":
			require_once("view/admin-pages/categories/create-category.php");
			break;
			// List category case
			case "/list/category":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			// Category responses from the controller
			case "/list/category?info=cc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=uc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=dc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			// Update category
			case "/update/category?id=".itemID():
			require_once("view/admin-pages/categories/update-category.php");	
			break;

			// Posts
			case "/create/post":
			require_once("view/admin-pages/posts/create-post.php");
			break;
			// List post case
			case "/list/post":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			// Post responses from the controller
			case "/list/post?info=cp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=up":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=dp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			// Update post
			case "/update/post?id=".itemID():
			require_once("view/admin-pages/posts/update-post.php");	
			break;

			// Projects 
			case "/create/project":
			require_once("view/admin-pages/projects/create-project.php");
			break;
			// List project case
			case "/list/project":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			// Project responses from the controller
			case "/list/project?info=cpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=upj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=dpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			// Update project
			case "/update/project?id=".itemID():
			require_once("view/admin-pages/projects/update-project.php");	
			break;


			// Users
			case "/create/user":
			require_once("view/admin-pages/users/create-user.php");
			break;
			// List users case
			case "/list/user":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			// Users responses from the controller
			case "/list/user?info=cu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=uu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=du":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			// Update user
			case "/update/user?id=".itemID():
			require_once("view/admin-pages/users/update-user.php");	
			break;

			// Error page
			default:				
			require_once("view/404.php");
			break;
		}

	}	

}