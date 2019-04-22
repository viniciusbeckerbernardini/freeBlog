<?php
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
if(verifyAuthUser()){
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Postagens</h2>
	<?php
	$results = listAllFromTable("FB_POST");
	
	// Getting the information the post has been deleted,updated,created.
	$message = filter_input(INPUT_GET,'info');
	if($message == 'cp'){
		echo "<script>alert('Post criado!');</script>";
	}else if($message == 'up'){
		echo "<script>alert('Post atualizado!');</script>";
	}else if($message == 'dp'){
		echo "<script>alert('Post deletado!');</script>";
	}
	?>

	<a class="btn waves-effect waves-light" href="/create/post">Criar post</a>
	<table class="table-responsive">
		<thead>
			<tr>
				<th>ID da postagem</th>
				<th>Título da postagem</th>
				<th>Conteúdo da postagem</th>
				<th>Categoria da postagem</th>
				<th>Foto destacada</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($results as $result):?>
				<tr>
					<td><?php echo $result['post_id'] ?></td>
					<td><?php echo $result['post_name'] ?></td>
					<td><?php echo $result['post_content'] ?></td>
					<td><?php echo $result['post_category'] ?></td>
					<td><?php echo "<img class='thumb-projects' src=".$result['post_featuredphoto'].">" ?></td>
					<td>
						<a href="/update/post?id=<?php echo $result['post_id']; ?>" class="btn waves-effect waves-light">
							Atualizar
						</a>
						<form method="post" action="/delete/post">
							<input type="hidden" name="postID" value="<?php echo $result['post_id']; ?>">
							<button class="btn waves-effect waves-light red">
								Deletar
							</button>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php
// Requesting the footer file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}
