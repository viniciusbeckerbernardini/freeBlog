<?php
/**
*@classname UserDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
// Creating Data Acess Object of User
class UserDAO extends User{

	// Creating Register function
	public function createUser(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO FB_USER (user_name,user_email,user_password,user_type)
			VALUES(:NAME,:EMAIL,:PASSWORD,:USERTYPE)",
			array(":NAME"=>$this->getName(),
				":EMAIL"=>$this->getEmail(),
				":PASSWORD"=>$this->getPassword(),
				":USERTYPE"=>$this->getUsertype()));
	}

	// Creating Update function
	public function updateUser($id,$name,$email,$password,$usertype){
		// Setting the parameters to UpdateUser
		$this->setUserid($id);
		$this->setName($name);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setUsertype($usertype);
		// Making the statement calling the query function
		$sql = new SQL();
		$statement = $sql->query("UPDATE FB_USER SET user_name = :NAME, user_email = :EMAIL, user_password = :PASSWORD, user_type = :USERTYPE where user_id = :ID",
			array(
				":ID" => $this->getUserId(),
				":NAME"=>$this->getName(),
				":EMAIL"=>$this->getEmail(),
				":PASSWORD"=>$this->getPassword(),
				":USERTYPE"=>$this->getUsertype()));
	}

	// Creating Delete function
	public  function deleteUser($id){
		$this->setUserid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE FROM FB_USER where user_id = :ID",
			array(":ID"=>$this->getUserid($id)));
	}
	// Creating list function
	public function listUser(){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_USER");
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	// Creating getInfoById function
	function getInfoById(){
		$id = $_GET['id'];
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_USER WHERE user_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
	}
	// Create login function
	function login($email,$password){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
		array(
		':EMAIL'=>$email,
		':PASSWORD'=>hash_hmac('sha256', $password, 'secret')
		));

		$result = $statement;
		// var_dump($result->fetchAll(PDO::FETCH_ASSOC));
		if($result->fetchAll(PDO::FETCH_ASSOC) != null){
			return $_SESSION['authUser'] = "true";
		}else{
			return $_SESSION['authUser'] = "false";
		}
	}
}
