<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Criar postagem</h2>
<div class="row">
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/postsController.php?operation=create" >
		<div class="input-field col s6">
			<input id="postname" name="postname" type="text" class="validate">
			<label for="postname">Título</label>
		</div>
		<div class="col s12">
			<h4>Conteúdo</h4>
			<textarea name="content" id="editor"></textarea>
		</div>
		<?php
		// Bring all projects
		// Instancing the class PDO
		$c = new CategoryDAO();
		$results = $c->listCategory();
		// print_r($results);
		?>
    <div class="col s12">
      <h4>Selecione a categoria da postagem</h4>
      <select name="postcategory">
        <option value="<?php echo $results['category_name'] ?>"></option>
      </select>
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
