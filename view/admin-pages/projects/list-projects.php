<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Projetos</h2>
<?php 
// Bring all projects
// Instancing the class PDO
$sql = new PDO("mysql:host=localhost;dbname=freeBlog","root","");
// Making the statement
$statement = $sql->prepare("SELECT * FROM tb_projects");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($results);
?>
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
				<td><?php echo $result['name'] ?></td>
				<td><?php echo $result['content'] ?></td>
				<td><?php echo "<img src=".$result['featuredphoto'].">" ?></td>
				<td><?php echo $result['deliverydate'] ?></td>
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

