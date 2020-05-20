<?php
if(isset($_POST["novo"])){
	require_once("../daos/editarDao.php");
	$criarConect = new EditarConect();
	$stmtFilial = $criarConect->runQuery("INSERT INTO filiais (idFilial, localFilial, telefoneFilial, whatsappFilial) VALUES (NULL, '".$_POST['local']."', '".$_POST['telefone']."', '".$_POST['wpp']."');");
	$stmtFilial->execute();
	
	header('Location:../index.php');
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Adicionar Filial - Mondi Pizza</title>

		<!-- Locais -->
		<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">
		<style>	
		body {
			background-color: #F6F2ED;
		}							
			label{
				font-size:18px;
			}
			
			form{
				width: 450px;
				heigth: 400px;
				margin: 10 0 0 40;
				padding: 0px 0px 50px 0px;
			}
			
			.texto{
				width: 374px;
				heigth: 200px;
				margin:auto;
			}
				
			button{
				width: 185px;
				heigth: 185px;
			}

		#addFilial {
			margin-left: 270px;
			width: 45vw;
			margin-top: 90px;
		}
			
		</style>
	</head>
	<body>
	<div id="addFilial" class="border border-warning">
		<form action="" method="post">
			<label><b>Local:</b></label>
			<br>
			<input type="text" class="texto" placeholder="Novo local" name="local" required>
			<br><br>
			<label><b>Telefone Fixo:</b></label>
			<br>
			<input type="text" class="texto" placeholder="Número do telefone" name="telefone" required>
			<br><br>
			<label><b>Whatsapp da Filial:</b></label>
			<br>	
			<input type="text" class="texto" name="wpp" placeholder="Número do Whatsapp">
			
		<div style="margin-top: 30px;">
				<button type="button" class="btn btn-danger" onclick="document.location = '../index.php#comoComprarEdit'">Cancelar</button>
				<button type="submit" class="btn btn-primary" name="novo">Adicionar</button>
			</div>
		</form>
		</div>
	<body>
</html>

