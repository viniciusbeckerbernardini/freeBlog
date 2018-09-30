<?php
/**
*@classname UsuaryDAO
*@author Leonardo Pereira Oliveira
*/
// Creating Data Acess Object of Usuary
class UsuaryDAO extends Usuary{
	// Making create Usuary
	public function createUsuary(){
		$sql = new SQL("localhost","freeBlog","root","");
		$statement = $sql->query("INSERT INTO tb_usuary (name,email,password,usuaryType)
			VALUES (:NAME,:EMAIL,:PASSWORD,:USUARYTYPE)",
		array(":NAME"=>$this->getName(),
          ":EMAIL"=>$this->getEmail(),
          ":PASSWORD"=>$this->getPassword(),
          ":USUARYTYPE"=>$this->getUsuaryType())
		);
	}
}
