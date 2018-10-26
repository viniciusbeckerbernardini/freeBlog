<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Categorias</h2>
<?php 
// Bring all projects
// Instancing the CategoryDAO class
$c = new UserDAO();
// Getting an array with results of the search
$results = $c->listUser();
?>
<a class="btn waves-effect waves-light" href="create-user.php">Criar usuário</a>
<table class="table-responsive">
	<thead>
		<tr>
			<th>ID do usuário</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Tipo de usuário</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $result):?>
			<tr>
				<td><?php echo $result['user_id'] ?></td>
				<td><?php echo $result['user_name'] ?></td>
				<td><?php echo $result['user_email'] ?></td>
				<td><?php echo $result['user_type'] ?></td>
				<td>
					<a href="update-user.php?id=<?php echo $result['user_id']; ?>" class="btn waves-effect waves-light">
						Atualizar
					</a>
					<a href="../../../controller/userController.php?operation=delete&userID=<?php echo $result['user_id']; ?>" class="btn waves-effect waves-light red">
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
	header('Location:'.siteURL().'/freeBlog/view/admin-pages/admin-login.php');
}

