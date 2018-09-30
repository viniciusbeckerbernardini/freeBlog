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
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("INSERT INTO tb_projects (name,content,featuredphoto,deliveryDate) 
			VALUES (:NAME,:CONTENT,:FEATUREDPHOTO,:DELIVERYDATE)",
		array(":NAME"=>$this->getName(),
			  ":CONTENT"=>$this->getContent(),
			  ":FEATUREDPHOTO"=>$this->getFeaturedphoto(),
			  ":DELIVERYDATE"=>$this->getDeliverydate())
		);
	}
}