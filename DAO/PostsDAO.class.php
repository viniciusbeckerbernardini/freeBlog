<?php
/**
*@classname PostsDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
// Creating Data Acess Object of Posts
class PostsDAO extends Posts{
	// Making create Posts
	public function createPost(){
		try {
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_POST (post_name,post_content,post_category)
				VALUES (:NAME,:CONTENT,:POSTCATEGORY)",
				array(":NAME"=>$this->getName(),
					":CONTENT"=>$this->getContent(),
					":POSTCATEGORY"=>$this->getPostCategory())
			);			
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}

	}
	// Making update Posts
	public function updatePost($id,$name,$content,$postCategory){
		try {
			$this->setPostid($id);
			$this->setName($name);
			$this->setContent($content);
			$this->setPostCategory($postCategory);
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_POST SET post_name = :NAME , post_content = :CONTENT, post_category = :POSTCATEGORY WHERE post_id = :ID",
				array(":NAME"=>$this->getName(),
					":CONTENT"=>$this->getContent(),
					":POSTCATEGORY"=>$this->getPostCategory(),
					":ID"=>$this->getPostId()));
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
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
			$this->setPostid($id);
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_POST WHERE post_id = :ID",
				array(":ID"=>$this->getPostid()));	
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
