<?php 
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Checking if is a authenticate user
if(verifyAuthUser()){
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
?>
<h2 class="center">Registrar usuário</h2>
<div class="row">	
	<form class="col s12" method="post" enctype="multipart/form-data" action="../../../controller/userController.php?operation=create" >
		<div class="input-field col s6">
			<input id="username" name="username" type="text" class="validate">
			<label for="username">Nome do usuário</label>
		</div>
		<div class="input-field col s6">
			<input type="email" id="useremail" name="useremail" class="validate">
			<label for="useremail">E-mail do usuário</label>
		</div>
		<div class="input-field col s6">
			<input type="password" id="userpassword" name="userpassword" class="userpassword validate">
			<label for="userpassword">Senha</label>
		</div>
		<div class="input-field col s6">
			<select name="usertype">
				<option value="" disabled selected>Escolha sua opção</option>
				<option value="administrador">Administrador</option>
				<option value="assinante">Assinante</option>
			</select>
			<label>Tipo de usuário</label>
		</div>
		<div class="col s12">
			<h4>Ações</h4>
			<button class="btn waves-effect waves-light" type="submit">
				Enviar
			</button>
			<button class="btn waves-effect waves-light red" type="reset">
				Limpar
			</button>
		</div>
	</form>
</div>
<?php 
// Requesting the footer file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
}else{
	header('Location:'.siteURL().'/freeBlog/view/admin-pages/admin-login.php');
}

