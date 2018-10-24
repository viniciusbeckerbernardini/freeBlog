<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<form action="<?php siteUrl(); ?>/controller/adminController.php">
	<div class="row">
		<div class="col s12 center">	
			<div class="row">
				<h2 class="center">Painel administrativo</h2>
				<div class="input-field col s6">
					<input id="email" type="email" class="validate">
					<label for="email">Email</label>
				</div>
				<div class="input-field col s6">
					<input id="password" type="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div class="input-field col s12">	
					<button class="btn waves-effect waves-light" type="submit" name="action">
						entrar
					</button>
				</div>	
				<div class="input-field col s12">	
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
require_once('..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');

