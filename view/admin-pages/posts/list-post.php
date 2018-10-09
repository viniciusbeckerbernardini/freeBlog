<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Postagens</h2>
<?php
// Bring all projects
// Instancing the class PDO
$p = new PostsDAO();
$results = $p->listPost();
// print_r($results);
?>
<table class="table-responsive">
	<thead>
		<tr>
			<th>ID da postagem</th>
			<th>Título da postagem</th>
			<th>Categoria da postagem</th>
      <th>Conteúdo da postagem<th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $result):?>
			<tr>
				<td><?php echo $result['post_id'] ?></td>
				<td><?php echo $result['post_name'] ?></td>
        <td><?php echo $result['post_content'] ?></td>
        <td><?php echo $result['post_category'] ?></td>
				<td>
					<a href="update-posts.php?id=<?php echo $result['post_id']; ?>" class="btn waves-effect waves-light">
						Atualizar
					</a>
					<a href="../../../controller/PostsController.php?operation=delete&postID=<?php echo $result['post_id']; ?>" class="btn waves-effect waves-light red">
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
