<?php 

function siteURL($return=false){
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$domainName = $_SERVER['HTTP_HOST'];
	if(!$return){
		echo $protocol.$domainName;
	}
	if($return){
		return $protocol.$domainName;	
	}
}

function itemID(){
	if($_GET['id']){
		$id = filter_input(INPUT_GET,"id");
		return $id;	
	}
}

function actualPage(){
	if(isset($_GET['p'])){
		$page = filter_input(INPUT_GET, "p");
		return $page;
	}
}

function router(){
	$uri = $_SERVER['REQUEST_URI'];
	$method = $_SERVER['REQUEST_METHOD'];

	if($method == "GET"){
		switch($uri){
			case '/':
			require_once("view/index.php");
			break;
			
			case "/admin":
			require_once("view/admin-pages/admin-login.php");
			break;
			case "/admin/":
			require_once("view/admin-pages/admin-login.php");
			break;
			case "/admin/panel":
			require_once("view/admin-pages/admin-panel.php");
			break;
			case "/admin/logout":
			require("controller".DIRECTORY_SEPARATOR."User.php");
			logout();
			break;
			case "/blog":
			require_once("view/blog.php");
			break;

			case "/create/category":
			require_once("view/admin-pages/categories/create-category.php");
			break;
			case "/list/category":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=cc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=uc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?info=dc":
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/list/category?p=".actualPage():
			require_once("view/admin-pages/categories/list-category.php");	
			break;
			case "/update/category?id=".itemID():
			require_once("view/admin-pages/categories/update-category.php");	
			break;

			case "/create/post":
			require_once("view/admin-pages/posts/create-post.php");
			break;
			case "/list/post":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=cp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=up":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/list/post?info=dp":
			require_once("view/admin-pages/posts/list-post.php");	
			break;
			case "/update/post?id=".itemID():
			require_once("view/admin-pages/posts/update-post.php");	
			break;

			case "/create/project":
			require_once("view/admin-pages/projects/create-project.php");
			break;
			case "/list/project":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=cpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=upj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/list/project?info=dpj":
			require_once("view/admin-pages/projects/list-project.php");	
			break;
			case "/update/project?id=".itemID():
			require_once("view/admin-pages/projects/update-project.php");	
			break;

			case "/create/user":
			require_once("view/admin-pages/users/create-user.php");
			break;
			case "/list/user":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=cu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=uu":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/list/user?info=du":
			require_once("view/admin-pages/users/list-user.php");	
			break;
			case "/update/user?id=".itemID():
			require_once("view/admin-pages/users/update-user.php");	
			break;

			default:				
			require_once("view/404.php");
			break;
		}

	}

	if($method == "POST"){
		switch ($uri) {
			case "/admin":
			require_once("controller".DIRECTORY_SEPARATOR."User.php");
			login();
			break;
			case "/create/category":
			require_once("controller".DIRECTORY_SEPARATOR."Category.php");
			create();
			break;
			case "/update/category":
			require_once("controller".DIRECTORY_SEPARATOR."Category.php");
			update();
			break;
			case "/delete/category":
			require_once("controller".DIRECTORY_SEPARATOR."Category.php");
			delete();
			break; 
			case "/create/post":
			require("controller".DIRECTORY_SEPARATOR."Post.php");
			create();
			break;
			case "/update/post":
			require("controller".DIRECTORY_SEPARATOR."Post.php");
			update();
			break;
			case "/delete/post":
			require("controller".DIRECTORY_SEPARATOR."Post.php");
			delete();
			break;
			case "/create/project":
			require("controller".DIRECTORY_SEPARATOR."Project.php");
			create();
			break;
			case "/update/project":
			require("controller".DIRECTORY_SEPARATOR."Project.php");
			update();
			break;
			case "/delete/project":
			require("controller".DIRECTORY_SEPARATOR."Project.php");
			delete();
			break;
			case "/create/user":
			require("controller".DIRECTORY_SEPARATOR."User.php");
			create();
			break;
			case "/update/user":
			require("controller".DIRECTORY_SEPARATOR."User.php");
			update();
			break;
			case "/delete/user":
			require("controller".DIRECTORY_SEPARATOR."User.php");
			delete();
			break;

			default:				
			require_once("view/404.php");
			break;
		}

	}
}