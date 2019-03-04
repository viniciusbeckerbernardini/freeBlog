<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
	// Requesting the header file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	// Getting the informations by the id passed in the $_GET
	$postId = $_GET['id'];
	$p = new PostDAO();
	$postInfo = $p->getInfoById($postId);
	// Instancing the class CategoryDAO
	$c = new CategoryDAO();
	// Acessing the list category method to display all categories to user can change
	$listCategory = $c->listCategory();
	// Getting the actual category from post
	$currentCategoryID = $postInfo['post_category'];
	// Acessing the method 
	$currentCategory = $c->getInfoByIdtoUpdatePost($currentCategoryID);
	?>
	<h2 class="center">Registrar postagem</h2>
	<div class="row">
		<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/postController.php?operation=update" >
			<div class="col s12">	
				<label>Imagem de destaque</label>
				<div class = "file-field input-field">
					<div class="btn">
						<span>Enviar</span>
						<input type="file" name="featuredphoto" enctype="multipart/form-data"/>
					</div>
					<div class = "file-path-wrapper">
						<input class="file-path validate" name="featuredphoto" value="<?php echo $postInfo['post_featuredphoto']; ?>" type ="text" placeholder="Upload file"/>
					</div>
				</div>
			</div>
			<div class="input-field col s6">
				<input id="postid" name="postid" type="text" readonly="readonly" value="<?php echo $postInfo['post_id']; ?>">
				<label for="postname">ID do post</label>
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
// Requesting the header file
require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}
