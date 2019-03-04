<?php
/**
*@classname PostsDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
// Creating Data Acess Object of Posts
class PostDAO{
	// Making create Posts
	public function createPost($name,$slug,$content,$category,$featuredPhotoPath){
		try {
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_POST (post_name,post_slug,post_content,post_category,post_featuredphoto)
				VALUES (:NAME,:SLUG,:CONTENT,:POSTCATEGORY,:POSTFEATUREDPHOTO)",
				array(":NAME"=>$name,
					":SLUG"=>$slug,
					":CONTENT"=>$content,
					":POSTCATEGORY"=>$category,
					":POSTFEATUREDPHOTO"=>$featuredPhotoPath
				)
			);			
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}

	}
	// Making update Posts
	public function updatePost($id,$name,$slug,$content,$postCategory,$featuredPhotoPath){
		try {
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_POST SET post_name = :NAME , post_slug = :SLUG, post_content = :CONTENT, post_category = :POSTCATEGORY, post_featuredphoto = :FEATUREDPHOTO WHERE post_id = :ID",
				array(":NAME"=>$name,
					":SLUG"=>$slug,
					":CONTENT"=>$content,
					":POSTCATEGORY"=>$postCategory,
					":FEATUREDPHOTO"=>$featuredPhotoPath,
					":ID"=>$id
				)
			);
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e");
		}
	}
	// Making list Post
	public function listPost(){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_POST");
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making delete Post
	public function deletePost($id){
		try {
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_POST WHERE post_id = :ID",
				array(":ID"=>$id));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making getInfoById function
	function getInfoById(){
		try {
			$id = $_GET['id'];
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_POST WHERE post_id = :ID",
				array(":ID"=>$id)
			);
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result[0];	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
}
