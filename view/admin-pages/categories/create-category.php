<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Registrar categoria</h2>
<div class="row">	
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/categoryController.php?operation=create" >
		<div class="input-field col s12">
			<input id="projectname" name="categoryname" type="text" class="validate">
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

