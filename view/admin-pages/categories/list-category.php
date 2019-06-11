<?php 
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
if(verifyAuthUser()){
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Categorias</h2>
	<?php
	$page = isset($_GET['p'])?$_GET['p']:1;
	$results = listAllFromTableWithPagination("FB_CATEGORY",(int)$page);
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
		<?php foreach ($results as $result): ?>
		<tr>
			<td> <?=$result['category_id']?></td>
			<td><?=$result['category_name']?></td>
			<td>
				<a href="/update/category?id=<?=$result['category_id']?>" class="btn waves-effect waves-light">
					Atualizar
				</a>
			<form method="post" action="/delete/category">
				<input type="hidden" name="categoryID" value="<?=$result["category_id"]?>">
				<button class="btn waves-effect waves-light red">
					Deletar
				</button>
			</form>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<div class="center pagination">
		<?php pagination("FB_CATEGORY"); ?>
	</div>
	<?php 
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}

