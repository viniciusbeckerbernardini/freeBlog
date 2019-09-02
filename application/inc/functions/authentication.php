<?php 

// Function to verify is the user is authenticate
function verifyAuthUser(){
	// Regenerating the id every new page
	// Verifying is the session variable exists
	if(isset($_SESSION['authUser'])){
		$login = $_SESSION['authUser']['login'];
		$password = $_SESSION['authUser']['password'];
		$sql = new Persistence\SQL();
		$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
			array(
				':EMAIL'=>$login,
				':PASSWORD'=>$password
			));

		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if($result != null){
			return true;
		}else if ($result == null){
			return false;	
		}
	}
}

function verifyAuthUserAndReturnTheID(){
	if(isset($_SESSION['authUser'])){
		$login = $_SESSION['authUser']['login'];
		$password = $_SESSION['authUser']['password'];
		$sql = new Persistence\SQL();
		$statement = $sql->query("SELECT * FROM FB_USER where user_email = :EMAIL and user_password = :PASSWORD",
			array(
				':EMAIL'=>$login,
				':PASSWORD'=>$password
			));

		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if($result != null){
			return $result[0]['user_id'];
		}else if ($result == null){
			return false;	
		}
	}
}