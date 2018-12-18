<?php 
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<form method="post" action="<?php siteUrl(); ?>/controller/adminController.php?operation=login">
	<div class="row">
		<div class="col s12 center">	
			<div class="row">
				<h2 class="center">Painel administrativo</h2>
				<div class="input-field col s6">
					<input id="email" type="email" name="email" class="validate">
					<label for="email">Email</label>
				</div>
				<div class="input-field col s6">
					<input id="password" type="password" name="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div class="input-field col s12">	
					<button class="btn waves-effect waves-light" type="submit" name="action">
						entrar
					</button>
				</div>	
				<div class="input-field col s12">	
					<br>
					<a href="#" onclick="alert('Paciência');">
						Esqueceu sua senha?
					</a>
				</div>
			</div>
		</div>
	</div>
</form>

<?php 	
// Requesting the footer file
require_once('view'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');

