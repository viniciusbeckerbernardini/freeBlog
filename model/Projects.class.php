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
	public function __construct($id = 0,$name,$content,$featuredPhoto,$deliveryDate){
		$this->setProjectid($id);
		$this->setName($name);
		$this->setContent($content);
		$this->setFeaturedphoto($featuredPhoto);
		$this->setDeliverydate($deliveryDate);
	}
	// Creating the destructor
	public function __destruct(){
		$this->setProjectid(-1);
		$this->setName('');
		$this->setContent('');
		$this->setFeaturedphoto('');
		$this->setDeliverydate('');
		echo "Object destruct was be a sucess!";


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
	// Getter of featured content
	public function getFeaturedphoto():string{
		return $this->featuredPhoto;
	}
	// Setter of featured photo
	public function setFeaturedphoto(string $value){
		$this->featuredPhoto = $value;
	}
	// Getter of Delivery date
	private function getDeliverydate():string{
		return $this->deliveryDate;
	}
	// Setter of Delivery date
	private function setDeliverydate(string $value){
		$this->deliveryDate = $value;
	}

	// Projects tooString
	public function __toString(){
		return nl2br(
			"ID do projeto: ".$this->getProjectid().
			"Nome do projeto: ".$this->getName().
			"Conteúdo: ".$this->getContent().
			"Imagem destacada: ".$this->getFeaturedphoto().
			"Data de entrega: ".$this->getDeliverydate()
		);
	}
}