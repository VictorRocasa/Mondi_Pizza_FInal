<?php
$resultado = 1; //Variável para indicar o sucesso do login
if (isset($_POST["logado"])) {
	require_once("../daos/loginDao.php");

	$loginConect = new admConect();

	$stmtLogin = $loginConect->runQuery("SELECT * FROM usuarios");
	$stmtLogin->execute();

	while ($rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC)) {

		if ($rowLogin['identificadorUsuario'] == $_POST["usuario"]) {
			if ($rowLogin['senhaUsuario'] == $_POST["senha"]) {
				session_start();
				$_SESSION["adm_session"] = 1;
				header('Location:../index.php');
			}
		}
	}
	$resultado = 0; //Caso nãoo aconteca login
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login - Mondi Pizza</title>

	<link rel="shortcut icon" href="../assets/logo.png" type="image/x-png" />
	<!-- Locais -->
	<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../plugins/css/login.css">
	<script type="text/javascript" src="../plugins/js/login.js"></script>
</head>

<body>
	<div id="login" style="">
		<br>
		<h2>Administração - Mondi Pizza</h2>
		<br>
		<div id="formLogin" class="border border-warning" style="margin:auto;">
			<form action="" method="post">
				<div class="form-group">
					<label for="usuario" class="font-weight-bold">Usuário</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="user">@</span>
						</div>
						<input type="text" class="form-control" id="usuario" aria-describedby="userHelp" name="usuario" required>
					</div>
					<small id="userHelp" class="form-text text-muted">Preencha com o nome de usuário cadastrado</small>
				</div>
				<div class="form-group">
					<label for="senha" class="font-weight-bold">Senha</label>
					<input type="password" class="form-control" id="senha" aria-describedby="senhaHelp" name="senha" required>
					<small id="senhaHelp" class="form-text text-muted">Preencha com a senha cadastrada</small>
				</div>
				<div id="buttons">
					<button type="button" class="btn btn-danger" onclick="document.location = '../index.php'"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</button>
					<button type="submit" style="float: right;" class="btn btn-primary" name="logado">Entrar <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
				</div>
				<?php
				if ($resultado == 0)
					echo "<h6 class='text-muted' style='margin-bottom: 0px; margin-top: 20px;'> Informações invalidas, tente novamente!</h6>";
				?>
			</form>
		</div>
	</div>
</body>

</html>