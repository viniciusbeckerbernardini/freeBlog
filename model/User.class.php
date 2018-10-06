<?php
/**
*@class User
*@author Leonardo Pereira Oliveira
*/

class User{
	// Creating atributes
	private $UserId;
	private $name;
	private $email;
	private $password;
	private $UserType;

	// Creating constructor
	public function __construct(){

	}
	// Creating destructor
	public function __destruct(){

	}
	// Creating Getters and Setters methods
	// Getter of UserId
	public function getUserId():int{
		return $this->UserId;
	}
	// Setter of UserId
	public function setUserId(int $value){
		$this->UserId = $value;
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
  // Getter of UserType
	public function getUserType():string{
		return $this->UserType;
	}
	// Setter of UserType
	public function setUserType(string $value){
		$this->UserType = $value;
	}

	// Creating User toString
	public function __toString(){
		return nl2br(
			"ID do usuário: ".getUserId().
			"Nome do usuário: ".getName().
			"E-Mail do usuário: ".getEmail().
			"Tipo do usuário: ".getUserType());
	}
}
