<!DOCTYPE html>
<html>
<head>
	<title>freeBlog</title>
	<!-- Metas  -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!-- End of metas -->
	<!-- Loading the stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php siteUrl(); ?>/view/library/css/materialize.min.css">
	<!-- Loading the materialize icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- End of loading the materialize icons -->
	<link rel="stylesheet" type="text/css" href="<?php siteUrl(); ?>/view/library/css/my-style.css">
	<!-- End of loading of stylesheet -->
</head>
<body>
	<header>
		<nav>
			<div class="nav-wrapper turquoise">
				<div class="container">
					<a href="#" class="brand-logo">freeBlog</a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="<?php siteURL();?>/view">Home</a></li>
						<li><a href="<?php siteURL();?>/view/blog.php">Blog</a></li>
						<li><a href="<?php siteURL();?>/view/portifolio.php">Portifólio</a></li>
						<?php if(verifyAuthUser()): ?>
							<li><a href="<?php siteURL(); ?>/view/admin-pages/admin-panel.php">Painel de controle</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>
			<h2 class="center">FreeBlog</h2>	
			<nav>
				<ul id="slide-out" class="sidenav">
					<?php if(verifyAuthUser()): ?>
						<li><a class="waves-effect" href="<?php siteURL(); ?>/view/admin-pages/admin-panel.php">Painel de controle</a></li>
					<?php endif; ?>
					<li><a class="waves-effect" href="<?php siteURL();?>/view">Home</a></li>
					<li><a class="waves-effect" href="<?php siteURL();?>/view/blog.php">Blog</a></li>
					<li><a class="waves-effect" href="<?php siteURL();?>/view/portifolio.php">Portifólio</a></li>
				</ul>
				<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			</nav>
	</header>
	<section>
		<div class="container">
			