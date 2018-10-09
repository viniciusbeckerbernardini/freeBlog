<?php 
/**
*@classname ProjectDAO
*@author Vinícius Becker
*@since 30/09/2018
*/
// Creating the Data Acess Object of Projects
class ProjectsDAO extends Projects{
	// Making the create project
	public function createProject(){
		$sql = new SQL();
		$statement = $sql->query("INSERT INTO fb_projects (project_name,project_content,project_featuredphoto,project_deliveryDate)
			VALUES (:NAME,:CONTENT,:FEATUREDPHOTO,:DELIVERYDATE)",
			array(":NAME"=>$this->getName(),
				":CONTENT"=>$this->getContent(),
				":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
				":DELIVERYDATE"=>$this->getDeliverydate())
		);
	}
	// Making the update project
	public function updateProject($id,$name,$content,$featuredphoto,$deliverydate){
		// Setting the parameters to update the project
		$this->setProjectid($id);
		$this->setName($name);
		$this->setContent($content);
		$this->setFeaturedphoto($featuredphoto);
		$this->setDeliverydate($deliverydate);
		// Making the steatement calling the query function
		$sql = new SQL();
		$statement = $sql->query("UPDATE fb_projects SET project_name=:NAME, project_content=:CONTENT,project_featuredphoto=:FEATUREDPHOTO,project_deliverydate=:DELIVERYDATE WHERE project_id = :ID",
			array(":NAME"=>$this->getName(),
				":CONTENT"=>$this->getContent(),
				":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
				":DELIVERYDATE"=>$this->getDeliverydate(),
				":ID"=>$this->getProjectid())
		);
	}
	// Making the delete project
	public function deleteProject($id){
		$this->setProjectid($id);
		$sql = new SQL();
		$statement = $sql->query("DELETE from fb_projects WHERE project_id = :ID",
			array(":ID"=>$this->getProjectid()));
	}

	// Creating list function
	public function listUser(){
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM fb_projects");
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	// Creating getInfoById function
	function getInfoById(){
		$id = $_GET['id'];
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM fb_projects WHERE project_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
	}

}
