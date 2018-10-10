<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.php');
// Getting the function getInfoById
$userID = $_GET['id'];
$u = new UserDAO();
$fieldsInfos = $u->getInfoById($userID);
?>
<h2 class="center">Atualizar usuário</h2>
<div class="row">
	<form class="col s12" method="post"  action="../../../controller/userController.php?operation=update">
		<div class="input-field col s6">
			<input id="userid" name="userid" type="text" readonly="readonly" value="<?php echo $fieldsInfos['user_id']; ?>"  class="validate disabled">
			<label for="projectid">ID do usuário</label>
		</div>
		<div class="input-field col s6">
			<input id="username" name="username" type="text" value="<?php echo $fieldsInfos['user_name']; ?>" class="validate">
			<label for="username">Nome do usuário</label>
		</div>
		<div class="input-field col s4">
			<input type="text" id="useremail" name="useremail" value="<?php echo $fieldsInfos['user_email']; ?>">
			<label for="useremail">E-mail do usuário</label>
		</div>
		<div class="input-field col s4">
			<input type="text" id="userpassword" name="userpassword" value="<?php echo $fieldsInfos['user_email'];
			; ?>">
			<label for="userpassword">Senha do usuário</label>
		</div>
		<div class="input-field col s4">
			<select name="usertype">
				<?php if($fieldsInfos['user_type'] == 'administrador'): ?>
					<option value="administrador" selected>Administrador</option>
					<option value="assinante">Assinante</option>
					<?php elseif($fieldsInfos['user_type'] == 'assinante'): ?>
						<option value="assinante" selected>Assinante</option>
						<option value="administrador">Administrador</option>
					<?php endif; ?>
				</select>
				<label>Tipo de usuário</label>
			</div>
			<div class="col s12">
				<h4>Ações</h4>
				<button class="btn waves-effect waves-light" type="submit">
					Atualizar
				</button>
				<button class="btn waves-effect waves-light red" type="reset">
					Cancelar
				</button>
			</div>
		</form>
	</div>
	<?php
// Requesting the footer file
	require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'footer.php');
