<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
// Requesting the header file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
	?>
	<h2 class="center">Painel adminstrativo</h2>
	<div class="row">
		<div class="col s12">	
			<div class="col s6">	
				<a href="#"><h6>Acompanhe no analitycs</h6></a>
				<h6>Visitas hoje: <strong>será integrado com o analytics</strong></h6> 
				<h6>Visitas totais:	<strong>será integrado com o analytics</strong></h6> 
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="col s6">
				<div class="collection">
					<h6 class="center">Posts</h6>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/posts/create-post.php" class="collection-item">Criar post</a>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/posts/list-post.php" class="collection-item">Listar posts</a>
				</div>
			</div>
			<div class="col s6">
				<div class="collection">
					<h6 class="center">Categorias</h6>
					<a href="<?php echo siteURL(); ?>/create/category" class="collection-item">Criar categoria</a>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/categories/list-category.php" class="collection-item">Listar categorias</a>
				</div>
			</div>
			<div class="col s6">

				<div class="collection">
					<h6 class="center">Projetos</h6>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/projects/create-project.php" class="collection-item">Criar projeto</a>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/projects/list-projects.php" class="collection-item">Listar projetos</a>
				</div>
			</div>
			<div class="col s6">
				<div class="collection">
					<h6 class="center">Usuários</h6>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/users/create-user.php" class="collection-item">Criar usuário</a>
					<a href="<?php echo siteURL(); ?>/view/admin-pages/users/list-users.php" class="collection-item">Listar usuários</a>
				</div>
			</div> 
		</div>	
	</div>
	<?php
	// Requesting the footer file
	require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}