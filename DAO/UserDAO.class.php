<?php
/**
*@classname UserDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of User
class UserDAO extends User{
	
	// Creating Register function
	public function createUser(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO fb_user (user_name,user_email,user_password,user_type)
			VALUES(:NAME,:EMAIL,:PASSWORD,:USERTYPE)",
			array(":NOME"=>$this->getName(),
				":EMAIL"=>$this->getEmail(),
				":PASSWORD"=>$this->getPassword(),
				":USERTYPE"=>$this->getUserType()));
	}
	
	
	// Creating Update function
	public function updateUser(){
		$sql = new SQL();
		$statement = $sql->query("UPDATE fb_user SET user_name = :NAME, user_email = :EMAIL, user_password = :PASSWORD, user_type = :USERTYPE where user_id = :ID",
			array(
				":ID" => $this->getUserId(),
				":NOME"=>$this->getName(),
				":EMAIL"=>$this->getEmail(),
				":PASSWORD"=>$this->getPassword(),
				":USERTYPE"=>$this->getUserType()));
	}
	
	// Creating Delete function
	public  function deleteUser($id){
		$this->setUserid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE FROM fb_user where user_id = :ID",
			array(":ID"=>$this->getUserId($id)));
	}
	// Creating list function
	public function listUser(){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM fb_user");
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}
