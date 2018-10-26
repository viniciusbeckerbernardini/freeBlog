<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
if($_SESSION['authUser'] == "true"){
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Categorias</h2>
<?php
// Bring all projects
// Instancing the class PDO
$c = new CategoryDAO();
$results = $c->listCategory();
// print_r($results);
?>
<a class="btn waves-effect waves-light" href="create-category.php">Criar categoria</a>
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
					<a href="update-category.php?id=<?php echo $result['category_id']; ?>" class="btn waves-effect waves-light">
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
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/view/admin-pages/admin-login.php');
}

