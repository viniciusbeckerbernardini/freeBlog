<?php 
// Register project test send file
// Config with autoload test
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
$u = new Projects();
?>

<form method="post" action="../../controller/projectController.php">
	<input type="text" name="oi">
	<button type="submit">Enviar</button>
</form>