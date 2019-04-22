<?php 
/**
*@author Vinícius Becker Bernardini
*@since 30/09/2018
*/

use \model\Project as Project;
use \DAO\Project as ProjectDAO;	

$operation = filter_input(INPUT_GET, "operation");

function create(){
	$name = filter_input(INPUT_POST, 'projectname');
	$deliverydate = filter_input(INPUT_POST, 'deliverydate');
	$content = filter_input(INPUT_POST, 'content');
	$nameForPhoto = str_replace(' ','_',$name);
	$featuredPhoto = $_FILES['featuredphoto'];

	// Checking possible error
	if($featuredPhoto['error']){
		throw new Exception("Erro no envio do arquivo, erro: ".$featuredPhoto['error']);
	}else{
		define('DIRNAME', "uploads");
		$year = date('Y');
		$month = date('m');

		$dirUpload = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');	

		if(!is_dir($dirUpload)){
			mkdir($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME);
			mkdir($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}
		$featuredPhoto['userfile']['name'] = $nameForPhoto.'_'.date('d_m_y_g_i_h').".jpg"; 
	}
	// Verifyng if he moves the file to directory, if its all right create the project
	if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
		// Creating the url to acess this photos after
		$featuredPhotoPath = siteURL().DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];

		$p = new Project($name,$content,$featuredPhotoPath,$deliverydate);
		$pDAO = new ProjectDAO();
		$pDAO->createProject($p->getName(),$p->getContent(),$p->getFeaturedphoto(),$p->getDeliverydate());
		
		// Info : cpj = created project
		header("Location: ".siteURL().'/list/project?info=cpj');
	}
}

function update(){
	$id = filter_input(INPUT_POST, 'projectid');
	$name = filter_input(INPUT_POST, 'projectname');
	$deliverydate = filter_input(INPUT_POST, 'deliverydate');
	$content = filter_input(INPUT_POST, 'content');
	$nameForPhoto = str_replace(' ','_',$name);
	$featuredPhoto = $_FILES['featuredphoto'];

	// Moving the photo into directory
	// Checking possible error
	if($featuredPhoto['error'] == 4){
		$featuredPhotoDesc = filter_input(INPUT_POST, 'featuredphotoDesc');
		// Instance of ProjectDAO, passing the parameters to the constructor to set the values
		$p = new Project($name,$content,$featuredPhotoDesc,$deliverydate,$id);
		$pDAO = new ProjectDAO();
			// Using the function createProject to create the register
		$pDAO->updateProject($p->getProjectid(),$p->getName(),$p->getContent(),$p->getFeaturedphoto(),$p->getDeliverydate());
		// Redirecting to the panel and informing the project has been updated
		// Info : cp = updated project
		header("Location: ".siteURL().'/list/project?info=upj');
	}else if($featuredPhoto['error'] != 4 && $featuredPhoto['error'] != 0 ){
		throw new Exception("Error Processing Request ".$featuredPhoto['error']);
	}else{
		define('DIRNAME', "uploads");
		$year = date('Y');
		$month = date('m');

		$dirUpload = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y').DIRECTORY_SEPARATOR.date('m');

		if(!is_dir($dirUpload)){
			mkdir($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME);
			mkdir($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.date('Y'));
			mkdir($dirUpload);
		}
		$featuredPhoto['userfile']['name'] = $nameForPhoto.'_'.date('d_m_y_g_i_h').".jpg";

		if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){

			$featuredPhotoPath = DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];


			$p = new Project($name,$content,$featuredPhotoPath,$deliverydate,$id);
			$pDAO = new ProjectDAO();
			$pDAO->updateProject($p->getProjectid(),$p->getName(),$p->getContent(),$p->getFeaturedphoto(),$p->getDeliverydate());

			// Info : cp = updated project
			header("Location: ".siteURL().'/list/project?info=upj');
		}
	}	
}


function delete(){
	$projectID = filter_input(INPUT_POST,'projectID');

	$p = new Project();
	$p->setProjectid($projectID);
	$pDAO = new ProjectDAO();
	$pDAO->deleteProject($p->getProjectid());

	// Info : cp = deleted project
	header("Location: ".siteURL().'/list/project?info=dpj');
}

?>