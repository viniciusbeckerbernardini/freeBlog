<?php
/**
*@classname PostsDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Posts
class PostsDAO extends Posts{
	// Making create Posts
	public function createPosts(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("INSERT INTO tb_posts (name,content,postCategory)
			VALUES (:NAME,:CONTENT,:POSTCATEGORY)",
		array(":NAME"=>$this->getName(),
          ":CONTENT"=>$this->getContent().
          ":POSTCATEGORY"=>$this->getPostCategory())
		);
	}
}
