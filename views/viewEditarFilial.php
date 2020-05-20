<?php
if (isset($_POST["editado"])) {
	require_once("../daos/editarDao.php");
	$inicioConect = new EditarConect();
	$stmtFilial = $inicioConect->runQuery("UPDATE filiais SET localFilial = '" . $_POST['local'] . "', telefoneFilial = '" . $_POST['telefone'] . "', whatsappFilial = '" . $_POST['wpp'] . "' where idFilial = " . $_POST['id'] . ";");
	$stmtFilial->execute();

	header('Location:../index.php');
} else {
	require_once("../daos/editarDao.php");

	$inicioConect = new EditarConect();

	$stmtFilial = $inicioConect->runQuery("SELECT *FROM filiais where idFilial = " . $_GET['id'] . ";");
	$stmtFilial->execute();
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Editar Filial - Mondi Pizza</title>

	<!-- Locais -->
	<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
	<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<style>
		body {
			background-color: #F6F2ED;
		}

		label {
			font-size: 18px;
		}

		form {
			width: 450px;
			heigth: 400px;
			margin: 10 0 0 40;
			padding: 0px 0px 50px 0px;
		}

		.texto {
			width: 374px;
			heigth: 200px;
			margin: auto;
		}

		button {
			width: 185px;
			heigth: 185px;
		}

		#editFilial {
			margin-left: 270px;
			width: 45vw;
			margin-top: 90px;
		}
	</style>
</head>

<body>
	<div id="editFilial" class="border border-warning">
		<form action='' method=post>
			<?php
			while ($rowFilial = $stmtFilial->fetch(PDO::FETCH_ASSOC)) {
				echo "
						<label><b>Local:</b></label>
						<br>
						<input type='text' class='texto' value='" . $rowFilial['localFilial'] . "' name=local required>
						<br><br>
						<label><b>Telefone Fixo:</b></label>
						<br>
						<input type=text class=texto value='" . $rowFilial['telefoneFilial'] . "' name=telefone required>
						<br><br>";
				echo "		<label><b>Whatsapp Filial:</b></label>
						<br>
						<input type=text class=texto name=wpp value='" . $rowFilial['whatsappFilial'] . "'>
						<input type=hidden value=" . $rowFilial['idFilial'] . " name=id>";
			}
			?>
			<div style="margin-top: 30px;">
				<button type="button" class="btn btn-danger" onclick="document.location = '../index.php#comoComprarEdit'">Cancelar</button>
				<button type="submit" class="btn btn-primary" name="editado">Confirmar Mudanças</button>
			</div>
		</form>
	</div>

	<body>

</html>