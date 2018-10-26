<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Projetos</h2>
<?php 
// Bring all projects
// Instancing the class ProjectsDAO
$p = new ProjectsDAO();
// Getting the data using the listUser Function
$results = $p->listUser();
?>
<a class="btn waves-effect waves-light" href="create-project.php">Criar projeto</a>
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
				<td><?php echo "<img src=".$result['project_featuredphoto'].">" ?></td>
				<td><?php echo $result['project_deliverydate'] ?></td>
				<td>
					<a href="update-project.php?id=<?php echo $result['project_id']; ?>" class="btn waves-effect waves-light">
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
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');

