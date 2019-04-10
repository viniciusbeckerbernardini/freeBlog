<?php 	
/**
* @class Projetcs
* @author Vinícius Becker Bernardini
*/
namespace model;

class Projects{
	// Creating the atributes
	private $projectID;
	private $name;
	private $content;
	private $featuredPhoto;
	private $deliveryDate;

	// Creating the constructor
	public function __construct($name = "",$content ="",$featuredPhoto ="",$deliveryDate="",$id = 0){
		$this->setName($name);
		$this->setContent($content);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setDeliverydate($deliveryDate);
		$this->setProjectid($id);
	}
	// Creating the destructor
	public function __destruct(){
		$this->setProjectid(-1);
		$this->setName('');
		$this->setContent('');
		$this->setFeaturedphoto('');
		$this->setDeliverydate('');
	}
	// Creating the gettes and setters methods
	// Getter of projectID
	public function getProjectid():int{
		return $this->projectID;
	}
	// Setter of projectID
	public function setProjectid(int $value){
		$this->projectID = $value;
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
	// Getter of featured photo
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}
	// Getter of Delivery date
	public function getDeliverydate():string{
		return $this->deliveryDate;
	}
	// Setter of Delivery date
	public function setDeliverydate(string $value){
		$this->deliveryDate = $value;
	}

	// Projects toString
	public function __toString(){
		return 
		"Nome do projeto: ".$this->getName().
		"<br>".
		"Conteúdo: ".$this->getContent().
		"<br>".
		"Imagem destacada: ".$this->getFeaturedphoto().
		"<br>".
		"Data de entrega: ".$this->getDeliverydate();
	}
}