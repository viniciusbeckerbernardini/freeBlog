<?php
/**
*@class Usuary
*@author Leonardo Pereira Oliveira
*/

class Usuary{
	// Creating atributes
	private $usuaryId;
	private $name;
  private $email;
  private $password;
  private $usuaryType;

	// Creating constructor
	public function __construct(){

	}
	// Creating destructor
	public function __destruct(){

	}
	// Creating Getters and Setters methods
	// Getter of usuaryId
	public function getUsuaryId():int{
		return $this->usuaryId;
	}
	// Setter of usuaryId
	public function setUsuaryId(int $value){
		$this->usuaryId = $value;
	}
	// Getter of name
	public function getName():string{
		return $this->name;
	}
	// Setter of name
	public function setName(string $value){
		$this->name = $value;
	}
  // Getter of email
	public function getEmail():string{
		return $this->email;
	}
	// Setter of email
	public function setEmail(string $value){
		$this->email = $value;
	}
  // Getter of password
	public function getPassword():int{
		return $this->password;
	}
	// Setter of password
	public function setPasswrod(int $value){
		$this->password = $value;
	}
  // Getter of usuaryType
	public function getUsuaryType():string{
		return $this->usuaryType;
	}
	// Setter of usuaryType
	public function setUsuaryType(string $value){
		$this->usuaryType = $value;
	}

	// Creating Usuary toString
	public function __toString(){
		return nl2br(
		"ID do usuário: ".getUsuaryId().
		"Nome do usuário: ".getName().
    "E-Mail do usuário: ".getEmail().
    "Tipo do usuário: ".getUsuaryType());
	}
}
