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
	$name = $_POST['postname'];
	$category = $_POST['postcategory'];
	$content = $_POST['postcontent'];
	$p = new PostsDAO($name,$content,$category);
	$p->createPost();
	// Printing the result
	echo "<h2>Post criado!</h2>";
	echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	break;
	
	default:
	echo "Operação inválida";
	break;
}


