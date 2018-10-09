<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
// Getting the informations by the id passed in the $_GET
$postId = $_GET['id'];
$p = new PostsDAO();
$result = $p->getInfoById($postId);

?>
<h2 class="center">Registrar postagem</h2>
<div class="row">
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/postsController.php?operation=update" >
		<div class="input-field col s6">
			<input id="postname" name="postid" type="text" readonly="readonly" value="<?php echo $result['post_id']; ?>">
			<label for="postname">ID da categoria</label>
		</div>
		<div class="input-field col s6">
			<input id="postname" name="postname" type="text" class="validate" value="<?php echo $result['post_name']; ?>">
			<label for="postname">Nome da postagem</label>
		</div>
    <div class="input-field col s6">
			<input id="postcontent" name="postcontent" type="text" class="validate" value="<?php echo $result['post_content']; ?>">
			<label for="postname">Conteúdo da postagem</label>
		</div>
    <div class="input-field col s6">
			<input id="postcategory" name="postcategory" type="text" class="validate" value="<?php echo $result['post_category']; ?>">
			<label for="postcategory">Categoria da postagem</label>
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
