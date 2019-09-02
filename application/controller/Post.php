<?php 
/**
* @author Vinícius Becker Bernardini
* @since 13/10/2018
*/

use \DAO\Post as PostDAO;
use \Model\Post as Post;


function create(){
	try {
		$name = filter_input(INPUT_POST, 'postname');
		$nameForPhoto = str_replace(' ','_',$name);
		$slug = createSlug($name);
		$category = filter_input(INPUT_POST,'postcategory');
		$content = filter_input(INPUT_POST, 'postcontent');
		$featuredPhoto = $_FILES['featuredphoto'];
		$author = verifyAuthUserAndReturnTheID();

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

		if(move_uploaded_file($featuredPhoto['tmp_name'], $dirUpload.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']["name"])){
			$featuredPhotoPath = DIRECTORY_SEPARATOR.DIRNAME.DIRECTORY_SEPARATOR.$year.DIRECTORY_SEPARATOR.$month.DIRECTORY_SEPARATOR.$featuredPhoto['userfile']['name'];

			$p = new Post($name,$slug,$content,$category,$featuredPhotoPath,$author);
			$pDAO = new PostDAO();
			$pDAO->createPost($p->getName(),$p->getSlug(),$p->getContent(),$p->getPostCategory(),$p->getFeaturedphoto(),$p->getAuthor());

			// Info : cp = created post
			header("Location: ".siteURL().'/list/post?info=cp');
		}	
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
}

function update(){
	try{
		$id = filter_input(INPUT_POST, 'post_id');
		$name = filter_input(INPUT_POST, 'postname');
		$nameForPhoto = str_replace(' ','_',$name);
		$slug = createSlug($name);
		$category = filter_input(INPUT_POST,'postcategory');
		$content = filter_input(INPUT_POST, 'postcontent');
		$featuredPhoto = $_FILES['featuredphoto'];
		if(isset($featuredPhoto)){
			if($featuredPhoto['error'] == 4){

				$featuredPhotoPath = filter_input(INPUT_POST,"featuredphoto");

				$p = new Post($name,$slug,$content,$category,$featuredPhotoPath,0,$id);

				$pDAO = new PostDAO();

				$pDAO->updatePost($p->getPostid(),$p->getSlug(),$p->getName(),$p->getContent(),$p->getPostCategory(),$p->getFeaturedphoto());
                // Info : up = updated postcontent
				header("Location: ".siteURL().'/list/post?info=up');

			}else if($featuredPhoto['error'] != 4  && $featuredPhoto['error'] != 0){
				throw new Exception("Error no envio da imagem, erro".$featuredPhoto['error']);
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

					$p = new Post($name,$slug,$content,$category,$featuredPhotoPath,0,$id);
					$pDAO = new PostDAO();
					$pDAO->updatePost($p->getPostid(),$p->getSlug(),$p->getName(),$p->getContent(),$p->getPostCategory(),$p->getFeaturedphoto());

					// Info : up = updated post
					header("Location: ".siteURL().'/list/post?info=up');
				}
			}
		}
	}catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
}

function delete(){
	$postID = filter_input(INPUT_POST, 'postID');

	$p = new Post();
	$p->setPostid($postID);
	$pDAO = new PostDAO();
	$pDAO->deletePost($postID);
	// Info : dp = deleted post
	header("Location: ".siteURL().'/list/post?info=dp');
}



