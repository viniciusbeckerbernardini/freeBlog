<?php 	
/**
* @class Projetcs
* @author Vinícius Becker Bernardini
*/

class Projects{
	// Creating the atributes
	private $projectID;
	private $name;
	private $content;
	private $featuredPhoto;
	private $deliveryDate;

	// Creating the constructor
	public function __construct(){

	}
	// Creating the destructor
	public function __destruct(){

	}
	// Creating the gettes and setters method's
	// Getter of projectID
	public function getProjectid():int{
		return $this->projectID;
	}
	// Setter of projectID
	public function setProjectid(int $value){
		$this->projectID = $v;
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
	// Getter of featured content
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}
	// Getter of Delivery date
	private function getDeliverydate(string $value){
		if(Validation::validaData($value)==true){
			return $this->deliveryDate;
		}else{
			return false;
		}
	}
	// Setter of Delivery date
	private function setDeliverydate():string{
		return $this->deliveryDate;
	}

	// Projects tooString
	public function __toString(){
		return nl2br(
			"ID do projeto: ".getProjectid().
			"Nome do projeto: ".getName().
			"Conteúdo: ".getContent().
			"Imagem destacada: ".getFeaturedphoto().
			"Data de entrega: ".getDeliverydate()
		);
	}
}