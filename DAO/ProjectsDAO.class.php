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
		$statement = $sql->query("INSERT INTO tb_projects (name,content,featuredphoto,deliveryDate) 
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
		$statement = $sql->query("UPDATE tb_projects SET name=:NAME, content=:CONTENT,featuredphoto=:FEATUREDPHOTO,deliverydate=:DELIVERYDATE WHERE project_id = :ID",
			array(":NAME"=>$this->getName(),
				":CONTENT"=>$this->getContent(),
				":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
				":DELIVERYDATE"=>$this->getDeliverydate(),
				":ID"=>$this->getProjectid())
		);
	}
	// Making the delete project
	public function deleteProject(){
		$sql = new SQL();
		$statement = $sql->query("DELETE from tb_projects WHERE project_id = :ID", 
			array(":ID"=>$this->getProjectid()));
	}

}