<?php 

use \Persistence\SQL as SQL;

function listAllFromTable($table){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM $table");
		$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $result;	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function listAllFromTableWithPagination($table, $limit){
	try {
		$itemStarter = $limit == 1?0:($limit -1) * 10 ;
		$itemFinnaly = 10;

		$sql = new SQL();

		$statement = $sql->query("SELECT * FROM $table LIMIT $itemStarter,$itemFinnaly");
		$result = $statement->fetchAll(\PDO::FETCH_ASSOC);

		return $result;	
		
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}	

function listFieldFromTable($table,$field){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT $field FROM $table");
		$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
		return $result;	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function getInfoByIdOfTable($table,$field){
	try {
		$id = filter_input(INPUT_GET,"id");
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM $table WHERE $field = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function getInfoByIdtoUpdatePost($id){
	try {
		$sql = new SQL();
		$statement = $sql->query("SELECT * FROM FB_CATEGORY WHERE category_id = :ID",
			array(":ID"=>$id)
		);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];	
	} catch (Exception $e) {
		throw new Exception("Error Processing Request, error $e", 1);
	}
}

function itensCounter($results){
	$htmlItem = "";	
	foreach ($results as $result){
		$htmlItem.="<tr>
		<td>".$result['category_id']."</td>
		<td>".$result['category_name']."</td>
		<td>
		<a href='/update/category?id=".$result['category_id']."' class='btn waves-effect waves-light'>
		Atualizar
		</a>
		<form method='post' action='/delete/category'>
		<input type='hidden' name='categoryID' value='".$result['category_id']."'>
		<button class='btn waves-effect waves-light red'>
		Deletar
		</button>
		</form>
		</td>
		</tr>";
	}
	echo $htmlItem;	 
}

function pagination(String $table){
	$sql = new SQL();
	$statement = $sql->query("SELECT SQL_CALC_FOUND_ROWS * FROM $table");
	$statement = $sql->query("SELECT FOUND_ROWS() as totalpages");
	$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
	$result = $result[0]['totalpages'];
	$result = ceil($result/10);


	$pattern = '/\?p=\d{1,}$/';
	$pattern2 = '/\?info=.{0,}$/';
	$uri = $_SERVER['REQUEST_URI'];
	$formatURI = preg_replace($pattern,'?p=',$uri);
	$formatURI = preg_replace($pattern2,'?p=',$formatURI);
	$html ='<div class="row">';
	$ii= 1;
	for ($i=1; $i <= $result ; $i++) {
		$html .='<div class="col s1"><a href="'.siteURL(true).$formatURI.$ii.'"/>'.$ii.'</a></div>';
		$ii++;
	}
	$html .='</div>';

	echo $html;
}
