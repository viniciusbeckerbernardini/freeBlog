<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<form method="post" action="../../controller/projectController.php">
	<input type="text" name="oi">
	<button type="submit">Enviar</button>
	<textarea name="content" id="editor"></textarea>
</form>

<?php 
// Requesting the footer file
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');

