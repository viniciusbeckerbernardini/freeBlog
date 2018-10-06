<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
// Getting the function getInfoById
$p = new ProjectsDAO();
$fieldsInfos = $p->getInfoById();
?>
<h2 class="center">Atualizar projeto</h2>
<div class="row">	
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/projectController.php?operation=update" >
		<div class="input-field col s4">
			<input id="projectid" name="projectid" type="text" value="<?php echo $fieldsInfos['project_id']; ?>"  class="validate disabled">
			<label for="projectid">ID do projeto</label>
		</div>
		<div class="input-field col s4">
			<input id="projectname" name="projectname" type="text" value="<?php echo $fieldsInfos['project_name']; ?>" class="validate">
			<label for="projectname">Nome do projeto</label>
		</div>
		<div class="input-field col s4">
			<input type="text" id="deliverydate" name="deliverydate" value="<?php echo $fieldsInfos['project_deliverydate'];
			; ?>" class="datepicker">
			<label for="deliverydate">Data de entrega</label>
		</div>
		<div class="col s12">	
			<label>Imagem de destaque</label>
			<div class = "file-field input-field">
				<div class="btn">
					<span>Enviar</span>
					<input type="file" name="featuredphoto" enctype="multipart/form-data"/>
				</div>
				<div class = "file-path-wrapper">
					<input class ="file-path validate" type="text" value="<?php echo $fieldsInfos['project_featuredphoto'];?>" placeholder="Upload file"/>
				</div>
			</div>
		</div>
		<div class="col s12">
			<h4>Conteúdo</h4>
			<textarea name="content" id="editor"><?php echo $fieldsInfos['project_content'];?></textarea>
		</div>
		<div class="col s12">
			<h4>Ações</h4>
			<button class="btn waves-effect waves-light" type="submit">
				Atualizar
			</button>
			<button class="btn waves-effect waves-light red" type="reset">
				Cancelar
			</button>
		</div>
	</form>
</div>
<?php 
// Requesting the footer file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');

