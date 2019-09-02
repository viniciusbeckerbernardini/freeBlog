<?php
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
if(verifyAuthUser()){
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	$projectInfo = getInfoByIdOfTable("FB_PROJECTS","project_id");
	?>
	<h2 class="center">Atualizar projeto</h2>
	<div class="row">
		<form class="col s12" method="post" enctype="multipart/form-data" action="/update/project" >
			<div class="input-field col s4">
				<input id="projectid" name="projectid" type="text" readonly="readonly" value="<?php echo $projectInfo['project_id']; ?>"  class="validate disabled">
				<label for="projectid">ID do projeto</label>
			</div>
			<div class="input-field col s4">
				<input id="projectname" name="projectname" type="text" value="<?php echo $projectInfo['project_name']; ?>" class="validate">
				<label for="projectname">Nome do projeto</label>
			</div>
			<div class="input-field col s4">
				<input type="text" id="deliverydate" name="deliverydate" value="<?php echo $projectInfo['project_deliverydate'];
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
						<input class ="file-path validate" name="featuredphotoDesc" type="text" value="<?php echo $projectInfo['project_featuredphoto'];?>" placeholder="Upload file"/>
					</div>
				</div>
			</div>
			<div class="col s12">
				<h4>Conteúdo</h4>
				<textarea name="content" id="editor"><?php echo $projectInfo['project_content'];?></textarea>
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
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}