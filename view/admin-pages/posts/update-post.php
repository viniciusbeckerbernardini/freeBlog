<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
// Getting the informations by the id passed in the $_GET
$postId = $_GET['id'];
$p = new PostsDAO();
$postInfo = $p->getInfoById($postId);
// Instancing the class CategoryDAO
$c = new CategoryDAO();
// Acessing the list category method to display all categories to user can change
$listCategory = $c->listCategory();
// Gettint the actual category from post
$currentCategoryID = $postInfo['post_category'];
// Acessing the method 
$currentCategory = $c->getInfoByIdtoUpdatePost($currentCategoryID);
?>
<h2 class="center">Registrar postagem</h2>
<div class="row">
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/postController.php?operation=update" >
		<div class="input-field col s6">
			<input id="postname" name="postid" type="text" readonly="readonly" value="<?php echo $postInfo['post_id']; ?>">
			<label for="postname">ID da categoria</label>
		</div>
		<div class="input-field col s6">
			<input id="postname" name="postname" type="text" class="validate" value="<?php echo $postInfo['post_name']; ?>">
			<label for="postname">Nome da postagem</label>
		</div>
		<div class="input-field col s12">
			<select name="postcategory">
				<option selected value="<?php echo $postInfo['post_category']; ?>">
					Categoria atual: <?php 	echo $currentCategory['category_name']; ?>
				</option>
				<?php 
				/* 
				Using the foreach to acess the indexes of the array,
				cutting of the current category.
				*/
				foreach ($listCategory as $categoryItem) { ?>
					<?php 	if($categoryItem['category_id'] == $currentCategory['category_id']){

					}else{ ?>
						<option value="<?php echo $categoryItem['category_id'] ?>">
							Categoria: <?php echo $categoryItem['category_name']; ?>
						</option>
					<?php 	} ?>
				<?php } ?>
			</select>
			<label for="postcategory">Categoria da postagem</label>
		</div>
		<div class="col s12">
			<h4>Conteúdo</h4>
			<textarea name="postcontent" id="editor">
				<?php echo $postInfo['post_content']; ?>
			</textarea>
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
