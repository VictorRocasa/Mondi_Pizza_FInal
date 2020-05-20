<?php
if(isset($_POST["confirmado"])){
	require_once("../daos/editarDao.php");
	
	$deletarConect = new EditarConect();
	
	$stmtDeletar = $deletarConect->runQuery("DELETE FROM cardapio WHERE idCardapio = ".$_POST['id'].";");
	$stmtDeletar->execute();
	header('Location:../index.php');
}
else{	
	require_once("../daos/editarDao.php");

	$inicioConect = new EditarConect();

	$stmtCardapio = $inicioConect->runQuery("SELECT *FROM cardapio where idCardapio = ".$_GET['id'].";");
	$stmtCardapio->execute();
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Apagar Pizza - Mondi Pizza</title>

		<!-- Locais -->
		<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">
		<style>		
		body{
			background-color: #F6F2ED;
		}		
		
			label{
				font-size:18px;
				padding: 10px 0px 0px 0px;
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
				cursor: default;
			}
				
			button{
				width: 185px;
				heigth: 185px;
			}

			#deletCardapio{
				margin-left: 270px;
				width: 50vw;
				margin-top: 90px;
			}
			
			
		</style>
	</head>
	<body>
		<div id="deletCardapio" class="border border-warning">
		<h5 style="padding: 0px 0px 0px 40px;">Deseja excluir os dados da seguinte pizza?</h5>
		<h5  style="color:red;padding: 0px 0px 0px 40px;font-size:28px;">ESSA AÇÃO É PERMANENTE!</h5>
		<form action='' method=post>
		<?php
			while ($rowCardapio = $stmtCardapio->fetch(PDO::FETCH_ASSOC)) {
				echo"
						<label><b>Sabor:</b></label>
						<br>
						<input type='text' class='texto' value='".$rowCardapio['nomeCardapio']."' readonly>
						<br>
						<label><b>Ingredientes:</b></label>
						<br>
						<input type=text class=texto value='".$rowCardapio['ingredientesCardapio']."'readonly>
						<br>
						<label><b>Tamanho:</b></label>
						<br>		
						<input type=text class=texto value='".$rowCardapio['tamanhoCardapio']."'readonly>
						<br>
						<label><b>Imagem:</b></label>
						<br>
						<input type=text class=texto value='".$rowCardapio['imagemCardapio']."'readonly>
						<label><b>Tipo de Pizza:</b></label>
						<br>	
						<input type=text class=texto value='".$rowCardapio['tipoCardapio']."'readonly>
						<br>
						<input type=hidden value=".$rowCardapio['idCardapio']." name=id>
				";
			}
		?>
		<div style="margin-top: 30px;">
		<button class="btn btn-danger" type="button" onclick="document.location = '../index.php#cardapio'">Cancelar</button>
		<button class="btn btn-primary" type="submit" name="confirmado">Confirmar Deleção</button>
		</div>
		</form>
		</div>	
			
	<body>
	
</html>

