<?php 
/**
* Controller of posts
* @author Vinícius Becker Bernardini
* @since 13/10/2017
* @updated for filter_input in 28/10/2018
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Using the $_GET to get the operation request
$operation = $_GET['operation'];
switch ($operation) {
	case 'create':
	// Getting the informations using $_POST
	$name = filter_input(INPUT_POST, 'postname');
	$slug = str_replace(" ", "-", $name);
	$category = filter_input(INPUT_POST,'postcategory');
	$content = filter_input(INPUT_POST, 'postcontent');
	$featuredPhoto = $_FILES['featuredphoto'];

	try {
		// Moving the photo into directory
		// Checking possible error
		if($featuredPhoto['error']){
			throw new Exception("Erro no envio do arquivo, erro: ".$featuredPhoto['error']);
		}else{
		// Crating the constant name of the directory
			define('DIRNAME', "uploads");

		// Creating the path of upload
			$year = date('Y');
			$month = date('m');
			$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
		// Checking if the path exists, if not create the path
			if(!is_dir($dirUpload)){
				mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
				mkdir('..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.date('Y'));
				mkdir($dirUpload);
			}
		// Changing the name of the file to a pattern name
			$featuredPhoto['userfile']['name'] = 'featuredPhoto_'.$nameForPhoto.'_'.date('d_m_y_g_i_h').'.jpg'; 
		}
		// Verifyng if he moves the file to directory, if its all right create the project
		if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
		// Creating the url to acess this photos after
			$featuredPhotoPath = DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
		// Instancing the PostsDAO class
		// Passing the values through the constructor
			$p = new PostsDAO($name,$slug,$content,$category,$featuredPhotoPath);
		// Acessing the createPost method to create the post
			var_dump($p);
			$p->createPost();
		// Redirecting to the panel and informing the post has been created
		// Info : cp = created post
			header("Location: ".siteURL().'/list/post?info=cp');
		}	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request", 1);
	}
	break;
	case 'update':
	// Getting the informations using $_POST
	$id = filter_input(INPUT_POST, 'postid');
	$name = filter_input(INPUT_POST, 'postname');
	$category = filter_input(INPUT_POST,'postcategory');
	$content = filter_input(INPUT_POST, 'postcontent');
	$featuredPhoto = $_FILES['featuredphoto'];
	try {
		if(isset($featuredPhoto)){
		// Moving the photo into directory
		// Checking possible error
			if($featuredPhoto['error'] == 4){
				// Passing the values through the constructor
				$p = new PostsDAO();
				// Acessing the update post method
				$p->updatePost($id,$name,$content,$category,$featuredPhoto);
				// Redirecting to the panel and informing the post has been updated
				// Info : up = updated post
				header("Location: ".siteURL().'/list/post?info=up');		
			}else if($featuredPhoto['error'] != 4){
				throw new Exception("Error no envio da imagem, erro".$featuredPhoto['erro']);
			}else{
				// Crating the constant name of the directory
				define('DIRNAME', "uploads");
				// Creating the path of upload
				$year = date('Y');
				$month = date('m');
				$dirUpload = "..".DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	
				// Checking if the path exists, if not create the path
				if(!is_dir($dirUpload)){
					mkdir('..'.DIRECTORY_SEPARATOR.DIRNAME);
					mkdir('..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.date('Y'));
					mkdir($dirUpload);
				}
				// Changing the name of the file to a pattern name
				$featuredPhoto['userfile']['name'] = 'featuredPhoto_'.$nameForPhoto.'_'.date('d_m_y_g_i_h').'.jpg'; 
				// Verifyng if he moves the file to directory, if its all right create the project
				if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
					// Passing the values through the constructor
					$p = new PostsDAO();
					// Acessing the update post method
					$p->updatePost($id,$name,$content,$category,$featuredPhoto);
					// Redirecting to the panel and informing the post has been updated
					// Info : up = updated post
					header("Location: ".siteURL().'/list/post?info=up');	
				}
			}	
		} 
	}catch (Exception $e) {
		throw new Exception("Error Processing Request", 1);
	}
	break;
	case 'delete':
	// Getting the post id using superglobal $_GET
	$postID = filter_input(INPUT_GET, 'postID');
	// Instancing the PostsDAO class
	$p = new PostsDAO();
	// Acessing the delete post method to delete post by id
	$p->deletePost($postID);
	// Redirecting to the panel and informing the category has been created
	// Info : dp = deleted post
	header("Location: ".siteURL().'/list/post?info=dp');
	break;
	// If get invalid operation
	default:
	// Print error message
	echo "Operação inválida";
	break;
}


