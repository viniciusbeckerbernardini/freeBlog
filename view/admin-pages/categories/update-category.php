<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if the user is authenticate
if(verifyAuthUser()){
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
// Getting the informations by the id passed in the $_GET
$categoryID = $_GET['id'];
$c = new CategoryDAO();
$result = $c->getInfoById($categoryID);

?>
<h2 class="center">Registrar categoria</h2>
<div class="row">	
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/categoryController.php?operation=update" >
		<div class="input-field col s6">
			<input id="projectname" name="categoryid" type="text" readonly="readonly" value="<?php echo $result['category_id']; ?>">
			<label for="projectname">ID da categoria</label>
		</div>
		<div class="input-field col s6">
			<input id="projectname" name="categoryname" type="text" class="validate" value="<?php echo $result['category_name']; ?>">
			<label for="projectname">Nome da categoria</label>
		</div>
		<div class="col s12">
			<h4>Ações</h4>
			<button class="btn waves-effect waves-light" type="submit">
				Enviar
			</button>
			<button class="btn waves-effect waves-light red" type="reset">
				Limpar
			</button>
		</div>
	</form>
</div>
<?php 
// Requesting the footer file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/freeBlog/view/admin-pages/admin-login.php');
}

