<?php 
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
if(verifyAuthUser()){
	// Requesting the header file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Categorias</h2>
	<?php
	// Bring all projects
	// Instancing the class PDO
	$c = new CategoryDAO();
	$results = $c->listCategory();
	// print_r($results);
	// Getting the information the post has been deleted,updated,created.
	$message = filter_input(INPUT_GET,'info');
	if($message == 'cc'){
		echo "<script>alert('Categoria criada!');</script>";
	}else if($message == 'uc'){
		echo "<script>alert('Categoria atualizada!');</script>";
	}else if($message == 'dc'){
		echo "<script>alert('Categoria deletada!');</script>";
	}
	?>

	<a class="btn waves-effect waves-light" href="/create/category">Criar categoria</a>
	<table class="table-responsive">
		<thead>
			<tr>
				<th>ID do categoria</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($results as $result):?>
				<tr>
					<td><?php echo $result['category_id'] ?></td>
					<td><?php echo $result['category_name'] ?></td>
					<td>
						<a href="/update/category?id=<?php echo $result['category_id']; ?>" class="btn waves-effect waves-light">
							Atualizar
						</a>
						<a href="../../../controller/categoryController.php?operation=delete&categoryID=<?php echo $result['category_id']; ?>" class="btn waves-effect waves-light red">
							Deletar
						</a>
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

