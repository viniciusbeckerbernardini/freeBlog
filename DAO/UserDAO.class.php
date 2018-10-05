<?php
/**
*@classname UserDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of User
class UserDAO extends User{
// Creating Register function
	public function registerUser(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("INSERT INTO tb_user (name,email,password,userType)
		VALUES(:NAME,:EMAIL,:PASSWORD,:USERTYPE)",
		array(":NOME"=>$this->getName(),
			  ":EMAIL"=>$this->getEmail(),
				":PASSWORD"=>$this->getPassword(),
			  ":USERTYPE"=>$this->getUserType()));
	}
// Creating List function
	public function listUser(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->select("SELECT * FROM tb_user");
	}
// Creating Update function
	public function updateUser(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("UPDATE tb_user SET name = :NAME, email = :EMAIL, password = :PASSWORD, userType = :USERTYPE where userId = :ID",
			array(
			  ":ID" => $this->getUserId(),
			  ":NOME"=>$this->getName(),
			  ":EMAIL"=>$this->getEmail(),
			  ":PASSWORD"=>$this->getPassword(),
				":USERTYPE"=>$this->getUserType()));
	}
// Creating Delete function
	public  function deleteUser($id){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("DELETE FROM tb_user where userId = :ID",
		array(":ID"=>$this->getUsuarioID($id)));
	}
}
