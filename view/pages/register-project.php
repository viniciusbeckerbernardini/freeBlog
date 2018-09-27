<?php 
// Register project test send file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
$u = new Projects();
$u->setName('JAJA');
echo $u->getName();
?>

<form method="post" action="../../controller/projectController.php">
	<input type="text" name="oi">
	<button type="submit">Enviar</button>
</form>