<?php
/**
*@classname PostsDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Posts
class PostsDAO extends Posts{
	// Making create Posts
	public function createPosts(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO fb_posts (post_name,post_content,post_category)
			VALUES (:NAME,:CONTENT,:POSTCATEGORY)",
		array(":NAME"=>$this->getName(),
          ":CONTENT"=>$this->getContent().
          ":POSTCATEGORY"=>$this->getPostCategory())
		);
	}
	// Making update projects
	public function updatePosts($id,$name,$content,$postCategory){
		$this->setPostid($id);
		$this->setName($name);
		$this->setContent($content);
		$this->setPostCategory($postCategory);
		$sql = new SQL();
		$statement = $sql->query("UPDATE fb_posts SET post_name = :NAME , post_content = :CONTENT, post_category = :POSTCATEGORY WHERE post_id = :ID",
			array(":NAME"=>$this->getName(),
				  ":CONTENT"=>$this->getContent(),
				  ":CATEGORY"=>$this->getPostCategory(),
				  ":ID"=>$this->getPostId()));
	}
	// Making the delete category 
	public function deleteCategory($id){
		$this->setPostid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE FROM fb_posts WHERE post_id = :ID",
		array(":ID"=>getPostid()));
	}
}
