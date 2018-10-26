<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');

?>

<h2 class="center">Vai ter os conteúdos para administrar aqui</h2>

<?php
// Requesting the footer file
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/freeBlog/view/admin-pages/admin-login.php');
}