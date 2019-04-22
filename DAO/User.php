<?php
/**
*@author Leonardo Pereira Oliveira & Vinícius Becker Bernardini
*/

namespace DAO;
use \PDO as PDO;
use \Persistence\SQL as SQL;

class User{

	public function createUser($name,$email,$password,$userType){
		try {
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_USER (user_name,user_email,user_password,user_type)
				VALUES(:NAME,:EMAIL,:PASSWORD,:USERTYPE)",
				array(":NAME"=>$name,
					":EMAIL"=>$email,
					":PASSWORD"=>$password,
					":USERTYPE"=>$userType));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	public function updateUser($id,$name,$email,$password,$userType){
		try {
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_USER SET user_name = :NAME, user_email = :EMAIL, user_password = :PASSWORD, user_type = :USERTYPE where user_id = :ID",
				array(
					":ID" => $id,
					":NAME"=>$name,
					":EMAIL"=>$email,
					":PASSWORD"=>$password,
					":USERTYPE"=>$userType));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	public  function deleteUser($id){
		try {
			$sql = new SQL();
			$statement = $sql->query("DELETE FROM FB_USER where user_id = :ID",
				array(":ID"=>$id));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	function login($email,$password){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
				array(
					':EMAIL'=>$email,
					':PASSWORD'=>hash_hmac('sha256', $password, 'secret')
				));

			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

			if($result != null){
				var_dump($result);
				$_SESSION['authUser']['login'] = $email;
				$_SESSION['authUser']['password'] = hash_hmac('sha256', $password, 'secret');
				return true;
			}else{
				return false;
			}	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error".$e);
		}
	}
}
