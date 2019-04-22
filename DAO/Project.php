<?php 
/**
*@classname ProjectDAO
*@author Vinícius Becker
*@since 30/09/2018
*/
namespace DAO;
use \PDO as PDO;
use \Persistence\SQL as SQL; 

class Project{
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

	public function updateProject($id,$name,$content,$featuredphoto,$deliverydate){
		try {
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

	public function deleteProject($id){
		try {
			$sql = new SQL();
			$statement = $sql->query("DELETE from FB_PROJECTS WHERE project_id = :ID",
				array(":ID"=>$id));	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request, error $e", 1);
		}
	}
}
