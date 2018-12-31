<?php
/**
*@classname UserDAO
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/
// Creating Data Acess Object of User
class UserDAO extends User{

	// Creating Register function
	public function createUser(){
		try {
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_USER (user_name,user_email,user_password,user_type)
				VALUES(:NAME,:EMAIL,:PASSWORD,:USERTYPE)",
				array(":NAME"=>$this->getName(),
					":EMAIL"=>$this->getEmail(),
					":PASSWORD"=>$this->getPassword(),
					":USERTYPE"=>$this->getUsertype()));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating Update function
	public function updateUser($id,$name,$email,$password,$usertype){
		try {
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
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating Delete function
	public  function deleteUser($id){
		try {
			$this->setUserid($id);
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_USER where user_id = :ID",
				array(":ID"=>$this->getUserid($id)));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Creating list function
	public function listUser(){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_USER");
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Creating getInfoById function
	function getInfoById(){
		try {
			$id = $_GET['id'];
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_USER WHERE user_id = :ID",
				array(":ID"=>$id)
			);
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result[0];	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Create login function
	function login($email,$password){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
				array(
					':EMAIL'=>$email,
					':PASSWORD'=>hash_hmac('sha256', $password, 'secret')
				));

			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			// var_dump($result->fetchAll(PDO::FETCH_ASSOC));
			if($result != null){
				var_dump($result);
				$_SESSION['authUser']['login'] = $email;
				$_SESSION['authUser']['password'] = hash_hmac('sha256', $password, 'secret');
				return true;
			}else{
				return false;
			}	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
}
