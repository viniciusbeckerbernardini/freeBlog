<?php
/**
*@class Posts
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
namespace model;

class Post{
	// Creating atributes
	private $postID;
	private $name;
	private $slug;
	private $content;
	private $postCategory;
	private $featuredPhoto;
	private $author;


	// Creating constructor
	public function __construct($name = "",$slug = "",$content = "",$postCategory = 0,$featuredPhoto = "",$author = 0, $id = 0){
		$this->setName($name);
		$this->setSlug($slug);
		$this->setContent($content);
		$this->setPostCategory($postCategory);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setAuthor($author);
		$this->setPostid($id);
	}
	// Creating destructor
	public function __destruct(){
	}

	// Creating Getters and Setters methods
	public function getPostid():int{
		return $this->postsID;
	}
	public function setPostid(int $value){
		$this->postsID = $value;
	}
	public function getName():string{
		return $this->name;
	}
	public function setName(string $value){
		$this->name = $value;
	}
	public function getSlug():string{
		return $this->slug;
	}
	public function setSlug(string $value){
		$this->slug = $value;
	}
	public function getContent():string{
		return $this->content;
	}
	public function setContent(string $value){
		$this->content = $value;
	}
	public function getPostCategory():int{
		return $this->postCategory;
	}
	public function setPostCategory(int $value){
		$this->postCategory = $value;
	}
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}
	public function setAuthor(int $author){
		$this->author = $author;
	}
	public function getAuthor():int{
		return $this->author;
	}

	public function __toString(){
		return nl2br(
			"ID da postagem: ".$this->getPostid().
			"Nome da postagem: ".$this->getName().
			"Conteúdo da postagem: ".$this->getContent().
			"Categoria da postagem: ".$this->getPostCategory());
	}
}
