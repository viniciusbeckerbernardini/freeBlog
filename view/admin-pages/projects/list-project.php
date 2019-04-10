<?php 
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
use \DAO\Projects as ProjectsDAO;
// Checking if is a authenticate user
if(verifyAuthUser()){
	// Requesting the header file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Projetos</h2>
	<?php 
	// Bring all projects
	// Instancing the class ProjectsDAO
	$p = new ProjectsDAO();
	// Getting the data using the listProject Function
	$results = $p->listProject();
	// Getting the information the post has been deleted,updated,created.
	$message = filter_input(INPUT_GET,'info');
	if($message == 'cpj'){
		echo "<script>alert('Projeto criado!');</script>";
	}else if($message == 'upj'){
		echo "<script>alert('Projeto atualizado!');</script>";
	}else if($message == 'dpj'){
		echo "<script>alert('Projeto deletado!');</script>";
	}
	?>
	<a class="btn waves-effect waves-light" href="/create/project">Criar projeto</a>
	<table class="table-responsive">
		<thead>
			<tr>
				<th>ID do projeto</th>
				<th>Nome</th>
				<th>Conteúdo</th>
				<th>Foto destacada</th>
				<th>Data de enthega</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($results as $result):?>
				<tr>
					<td><?php echo $result['project_id'] ?></td>
					<td><?php echo $result['project_name'] ?></td>
					<td><?php echo $result['project_content'] ?></td>
					<td><?php echo "<img class='thumb-projects' src=".$result['project_featuredphoto'].">" ?></td>
					<td><?php echo $result['project_deliverydate'] ?></td>
					<td>
						<a href="/update/project?id=<?php echo $result['project_id']; ?>" class="btn waves-effect waves-light">
							Atualizar
						</a>
						<a href="../../../controller/projectController.php?operation=delete&projectID=<?php echo $result['project_id']; ?>" class="btn waves-effect waves-light red">
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
