<?php 
// Register project test send file
// Config with autoload test
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
$u = new Projects(0,'Vinicius','Blablabla','imagem2','12/12/2012');
echo $u;
?>

<form method="post" action="../../controller/projectController.php">
	<input type="text" name="oi">
	<button type="submit">Enviar</button>
</form>