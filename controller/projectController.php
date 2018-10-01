<?php 
/**
*@author Vinícius Becker Bernardini
*@since 30/09/2018
* Projects controller
*/
// Request the configuration file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Getting the operation using $_GET
$operation = $_GET['operation'];
switch ($operation) {
	case 'create':
	// Getting the values of the form using $_POST
	$name = $_POST['projectname'];
	$deliverydate = $_POST['deliverydate'];
	$content = $_POST['content'];
	$nameForPhoto = str_replace(' ','_',$name);
	$featuredPhoto = $_FILES['featuredphoto'];

	// Moving the photo into directory
	// Checking possible error
	if($featuredPhoto['error']){
		throw new Exception("Erro no envio do arquivo, erro: ".$featuredPhoto['error']);
	}else{
	// Crating the constant name of the directory
		define('DIRNAME', "uploads");
	// Creating the path of upload
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
		$featuredPhotoPath = $_SERVER['SERVER_NAME'].DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];
	// Instance of ProjectDAO, passing the parameters to the constructor to set the values
		$p = new ProjectsDAO($name,$content,$featuredPhotoPath,$deliverydate);
	// Using the function createProject to create the register
		$p->createProject();
		echo "<h2>Projeto criado!</h2>";
		echo '<h4><a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	break;

	case 'update':
		
	break;

	case 'delete':

	break;
	
	default:
		echo "Operação inválida";
	break;
}
?>