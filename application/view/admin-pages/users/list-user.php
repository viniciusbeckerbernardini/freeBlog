<?php 
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
if(verifyAuthUser()){
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Usuários</h2>
	<?php 
	$results = listAllFromTable("FB_USER");

// Getting the information the post has been deleted,updated,created.
	$message = filter_input(INPUT_GET,'info');
	if($message == 'cu'){
		echo "<script>alert('Usuário criado!');</script>";
	}else if($message == 'uu'){
		echo "<script>alert('Usuário atualizado!');</script>";
	}else if($message == 'du'){
		echo "<script>alert('Usuário deletado!');</script>";
	}
	?>
	<a class="btn waves-effect waves-light" href="/create/user">Criar usuário</a>
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
						<a href="/update/user?id=<?php echo $result['user_id']; ?>" class="btn waves-effect waves-light">
							Atualizar
						</a>
						<form method="post" action="/delete/user">
							<input type="hidden" name="userID" value="<?php echo $result['user_id']; ?>">
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

