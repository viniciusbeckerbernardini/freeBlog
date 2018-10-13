<?php 
/**
* Controller of posts
* @author Vinícius Becker Bernardini
* @since 13/10/2017
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation) {
	case 'create':
	// Getting the informations using $_POST
	$name = $_POST['postname'];
	$category = $_POST['postcategory'];
	$content = $_POST['postcontent'];
	// Instancing the PostsDAO class
	// Passing the values through the constructor
	$p = new PostsDAO($name,$content,$category);
	// Acessing the createPost method to create the post
	$p->createPost();
	// Printing the result
	echo "<h2>Post criado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	case 'update':
	// Getting the informations using $_POST
	$id = $_POST['postid'];
	$name = $_POST['postname'];
	$category = $_POST['postcategory'];
	$content = $_POST['postcontent'];
	// Passing the values through the constructor
	$p = new PostsDAO();
	// Acessing the update post method
	$p->updatePost($id,$name,$content,$category);
	// Printing the result
	echo "<h2>Post atualizado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	case 'delete':
	// Getting the post id using superglobal $_GET
	$postID = $_GET['postID'];
	// Instancing the PostsDAO class
	$p = new PostsDAO();
	// Acessing the delete post method to delete post by id
	$p->deletePost($postID);
	// Printing the result
	echo "<h2>Post deletado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	break;
}


