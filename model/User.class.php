<?php
/**
*@class User
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/

class User{
	// Creating atributes
	private $userID;
	private $name;
	private $email;
	private $password;
	private $userType;

	// Creating constructor
	public function __construct($name="",$email="",$password="",$userType=""){
		$this->setName($name);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setUsertype($userType);
	}
	// Creating destructor
	public function __destruct(){

	}
	// Creating Getters and Setters methods
	// Getter of UserId
	public function getUserid():int{
		return $this->userID;
	}
	// Setter of UserId
	public function setUserid(int $value){
		$this->userID = $value;
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
	public function getPassword():string{
		return $this->password;
	}
	// Setter of password
	public function setPassword(string $value){
		$this->password = $value;
	}
  	// Getter of UserType
	public function getUsertype():string{
		return $this->userType;
	}
	// Setter of UserType
	public function setUsertype(string $value){
		$this->userType = $value;
	}

	// Creating User toString
	public function __toString(){
		return nl2br(
			"ID do usuário: ".getUserId().
			"Nome do usuário: ".getName().
			"E-Mail do usuário: ".getEmail().
			"Tipo do usuário: ".getUsertype());
	}
}
