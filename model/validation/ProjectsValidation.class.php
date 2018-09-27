<?php 

class ProjectsValidation{
	public static function validaData($date):bool{
		$validate = preg_match('/^([1-9]|1[0,1,2])-([1-9]|0[1-9]|[1,2][0-9]|3[0,1])-\d{4}$/', $date);
		if($validate == true){
			return true;
		}else{
			return false;
		}
	}
}