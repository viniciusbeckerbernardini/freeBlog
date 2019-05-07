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
					<a href="<?php echo siteURL(); ?>/create/post" class="collection-item">Criar post</a>
					<a href="<?php echo siteURL(); ?>/list/post" class="collection-item">Listar posts</a>
				</div>
			</div>
			<div class="col s6">
				<div class="collection">
					<h6 class="center">Categorias</h6>
					<a href="<?php echo siteURL(); ?>/create/category" class="collection-item">Criar categoria</a>
					<a href="<?php echo siteURL(); ?>/list/category?p=1" class="collection-item">Listar categorias</a>
				</div>
			</div>
			<div class="col s6">

				<div class="collection">
					<h6 class="center">Projetos</h6>
					<a href="<?php echo siteURL(); ?>/create/project" class="collection-item">Criar projeto</a>
					<a href="<?php echo siteURL(); ?>/list/project" class="collection-item">Listar projetos</a>
				</div>
			</div>
			<div class="col s6">
				<div class="collection">
					<h6 class="center">Usuários</h6>
					<a href="<?php echo siteURL(); ?>/create/user" class="collection-item">Criar usuário</a>
					<a href="<?php echo siteURL(); ?>/list/user" class="collection-item">Listar usuários</a>
				</div>
			</div> 
		</div>	
	</div>
	<?php
	// Requesting the footer file
	require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/admin');
}