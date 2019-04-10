<?php 
/**
*@classname ProjectDAO
*@author Vinícius Becker
*@since 30/09/2018
*/
namespace DAO;
use \PDO as PDO;
use \model\SQL as SQL; 
// Creating the Data Acess Object of Projects
class Projects{
	// Making the create project
	public function createProject($name,$content,$featuredPhotoPath,$deliverydate){
		try {
			$sql = new SQL();
			$statement = $sql->query("INSERT INTO FB_PROJECTS (project_name,project_content,project_featuredphoto,project_deliveryDate)
				VALUES (:NAME,:CONTENT,:FEATUREDPHOTO,:DELIVERYDATE)",
				array(":NAME"=>$name,
					":CONTENT"=>$content,
					":FEATUREDPHOTO"=>$featuredPhotoPath,
					":DELIVERYDATE"=>$deliverydate)
			);
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making the update project
	public function updateProject($id,$name,$content,$featuredphoto,$deliverydate){
		// Setting the parameters to update the project
		try {
			// Making the steatement calling the query function
			$sql = new SQL();
			$statement = $sql->query("UPDATE FB_PROJECTS SET project_name=:NAME, project_content=:CONTENT,project_featuredphoto=:FEATUREDPHOTO,project_deliverydate=:DELIVERYDATE WHERE project_id = :ID",
				array(":NAME"=>$name,
					":CONTENT"=>$content,
					":FEATUREDPHOTO"=>$featuredphoto,
					":DELIVERYDATE"=>$deliverydate,
					":ID"=>$id)
			);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
	// Making the delete project
	public function deleteProject($id){
		try {
			$sql = new SQL();
			$statement = $sql->query("DELETE from FB_PROJECTS WHERE project_id = :ID",
				array(":ID"=>$id));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

	// Creating list function
	public function listProject(){
		try {
			$sql = new SQL();
			$statement = $sql->query("SELECT * FROM FB_PROJECTS");
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
			$statement = $sql->query("SELECT * FROM FB_PROJECTS WHERE project_id = :ID",
				array(":ID"=>$id)
			);
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result[0];	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}

}