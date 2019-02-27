<?php
/**
*@class Posts
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/

class Post{
	// Creating atributes
	private $postID;
	private $name;
	private $slug;
	private $content;
	private $postCategory;
	private $featuredPhoto;


	// Creating constructor
	public function __construct($name = "",$slug = "",$content = "",$postCategory = 0,$featuredPhoto = "", $id = 0){
		$this->setName($name);
		$this->setSlug($slug);
		$this->setContent($content);
		$this->setPostCategory($postCategory);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setPostid($id);
	}
	// Creating destructor
	public function __destruct(){
	}

	// Creating Getters and Setters methods
	// Getter of postsId
	public function getPostid():int{
		return $this->postsID;
	}
	// Setter of postsId
	public function setPostid(int $value){
		$this->postsID = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}
	// Getter of slug
	public function getSlug():string{
		return $this->slug;
	}
	// Setter of slug
	public function setSlug(string $value){
		$this->slug = $value;
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

	// Getter of featured content
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}

	// Creating Posts toString
	public function __toString(){
		return nl2br(
			"ID da postagem: ".$this->getPostid().
			"Nome da postagem: ".$this->getName().
			"Conteúdo da postagem: ".$this->getContent().
			"Categoria da postagem: ".$this->getPostCategory());
	}
}
