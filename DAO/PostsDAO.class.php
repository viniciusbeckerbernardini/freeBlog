<?php
/**
*@classname PostsDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Posts
class PostsDAO extends Posts{
	// Making create Posts
	public function createPost(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO FB_POST (post_name,post_content,post_category)
			VALUES (:NAME,:CONTENT,:POSTCATEGORY)",
		array(":NAME"=>$this->getName(),
          ":CONTENT"=>$this->getContent(),
          ":POSTCATEGORY"=>$this->getPostCategory())
		);
	}
	// Making update Posts
	public function updatePost($id,$name,$content,$postCategory){
		$this->setPostid($id);
		$this->setName($name);
		$this->setContent($content);
		$this->setPostCategory($postCategory);
		$sql = new SQL();
		$statement = $sql->query("UPDATE FB_POST SET post_name = :NAME , post_content = :CONTENT, post_category = :POSTCATEGORY WHERE post_id = :ID",
			array(":NAME"=>$this->getName(),
				  ":CONTENT"=>$this->getContent(),
				  ":CATEGORY"=>$this->getPostCategory(),
				  ":ID"=>$this->getPostId()));
	}
	// Making list Post
	public function listPost(){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_POST");
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	// Making delete Post
	public function deletePost($id){
		$this->setPostid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE FROM FB_POST WHERE post_id = :ID",
		array(":ID"=>getPostid()));
	}
	// Making getInfoById function
	function getInfoById(){
		$id = $_GET['id'];
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_POST WHERE post_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
	}
}
