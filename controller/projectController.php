<?php 
// Project Controller test file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');	
$name  = $_POST['oi'];
$u = new Projects();
$u->setName($name);
echo $u->getName();
 ?>