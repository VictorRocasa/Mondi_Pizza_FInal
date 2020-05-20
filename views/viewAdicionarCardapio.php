<?php
if(isset($_POST["novo"])){
	$novoTamanho = '';
	$qtd = 0;
	if(isset($_POST['pp'])){
		$novoTamanho .= "PP";
		$qtd++;
	}
	if(isset($_POST['p'])){
		if($qtd > 0)
			$novoTamanho .= ",";
		$novoTamanho .= "P";
		$qtd++;
	}
	if(isset($_POST['m'])){
		if($qtd > 0)
			$novoTamanho .= ",";
		$novoTamanho .= "M";
		$qtd++;
	}
	if(isset($_POST['g'])){
		if($qtd > 0)
			$novoTamanho .= ",";
		$novoTamanho .= "G";
		$qtd++;
	}
	if(isset($_POST['gg'])){
		if($qtd > 0)
			$novoTamanho .= ",";
		$novoTamanho .= "GG";
		$qtd++;
	}
	if($qtd === 0)
		$novoTamanho = "PP";
	require_once("../daos/editarDao.php");
	$criarConect = new EditarConect();
	$stmtCardapio = $criarConect->runQuery("INSERT INTO cardapio (idCardapio, nomeCardapio, ingredientesCardapio, tamanhoCardapio, imagemCardapio, tipoCardapio) VALUES (NULL, '".$_POST['sabor']."', '".$_POST['ingredientes']."', '".$novoTamanho."', '".$_POST['imagem']."', '".$_POST['tipo']."');");
	$stmtCardapio->execute();
	
	header('Location:../index.php');
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Adicionar Pizza - Mondi Pizza</title>

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

			#addCardapio{
				margin-left: 270px;
				width: 50vw;
				margin-top: 90px;
			}
		</style>
	</head>
		<div id="addCardapio" class="border border-warning">
		<form action="" method="post">
			<label><b>Sabor:</b></label>
			<br>
			<input type="text" class="texto" placeholder="Novo sabor" name="sabor" required>
			<br><br>
			<label><b>Ingredientes:</b></label>
			<br>
			<input type="text" class="texto" placeholder="Lista de Ingredientes" name="ingredientes" required>
			<br><br>
			<label><b>Tamanho:</b></label>
			
			<br>
			<input type="checkbox" id="PP" name="pp">
			<label for="PP">PP</label>
			<input type="checkbox" id="P" name="p">
			<label for="P">P</label>
			<input type="checkbox" id="M" name="m">
			<label for="M">M</label>
			<input type="checkbox" id="G" name="g">									
			<label for="G">G</label>
			<input type="checkbox" id="GG" name=gg>			
			<label for="GG">GG</label>
					
			<br>		<br>
			<label><b>Imagem:</b></label>
			<br>	
			<input type="text" class="texto" name="imagem" placeholder="Nome da imagem">
			<br><br>
			<label><b>Tipo de Pizza:</b></label>
			<br>
		    <input type="radio" id="salgada" name="tipo" value="Salgada" checked>
		    <label for="salgada">Salgada</label><br>
		    <input type="radio" id="doce" name="tipo" value="Doce">
		    <label for="doce">Doce</label><br>
		
			<div style="margin-top: 30px;">
			<button class="btn btn-danger" type="button" onclick="document.location = '../index.php#cardapio'">Cancelar</button>
			<button type="submit" class="btn btn-primary" name="novo">Adicionar</button>
		</div>
		</form>
		</div>
	<body>
</html>

