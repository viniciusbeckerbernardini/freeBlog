<?php
/**
*@class Posts
*@author Leonardo Pereira Oliveira
*/

class Posts{
	// Creating atributes
	private $postsId;
	private $name;
  private $content;
  private $postCategory;

	// Creating constructor
	public function __construct(){
	}
	// Creating destructor
	public function __destruct(){
	}

	// Creating Getters and Setters methods
	// Getter of postsId
	public function getPostsId():int{
		return $this->postsId;
	}
	// Setter of postsId
	public function setPostsId(int $value){
		$this->postsId = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}
  // Getter of content
	public function getContent():string{
		return $this->content;
	}
	// Setter of content
	public function setContent(string $value){
		$this->content = $value;
	}
  // Getter of postCategory
	public function getPostCategory():int{
		return $this->postCategory;
	}
	// Setter of postCategory
	public function setPostCategory(int $value){
		$this->postCategory = $value;
	}

	// Creating Posts toString
	public __toString(){
		return nl2br(
		"ID da postagem: ".getPostsId().
		"Nome da postagem: ".getName().
    "Conteúdo da postagem: ".getContent().
    "Categoria da postagem: ".getPostCategory());
	}
}
