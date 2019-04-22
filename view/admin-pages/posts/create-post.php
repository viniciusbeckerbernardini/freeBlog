<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
use \DAO\Category as CategoryDAO;
// Checking if is a authenticate user
if(verifyAuthUser()){
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	$results = listAllFromTable("FB_CATEGORY");
	?>
	<h2 class="center">Criar postagem</h2>
	<div class="row">
		<form class="col s12" method="post" enctype="multipart/form-data" action="/create/post" >
			<div class="col s12">	
				<label>Imagem de destaque</label>
				<div class = "file-field input-field">
					<div class="btn">
						<span>Enviar</span>
						<input type="file" name="featuredphoto" enctype="multipart/form-data"/>
					</div>
					<div class = "file-path-wrapper">
						<input class ="file-path validate" type ="text" placeholder="Upload file"/>
					</div>
				</div>
			</div>
			<div class="input-field col s6">
				<input id="postname" name="postname" type="text" class="validate">
				<label for="postname">Título</label>
			</div>
			<div class="input-field col s6">
				<select name="postcategory">
					<?php foreach ($results as $result) { ?>
						<option value="<?php echo $result['category_id']; ?>">
							Categoria: <?php echo $result['category_name']; ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="col s12">
				<h4>Conteúdo</h4>
				<textarea name="postcontent" id="editor"></textarea>
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
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}