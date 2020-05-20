<?php
if(isset($_POST["editado"])){
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
	$inicioConect = new EditarConect();
	$stmtCardapio = $inicioConect->runQuery("UPDATE cardapio SET nomeCardapio = '".$_POST['sabor']."', ingredientesCardapio = '".$_POST['ingredientes']."', tamanhoCardapio = '".$novoTamanho."', imagemCardapio = '".$_POST['imagem']."', tipoCardapio = '".$_POST['tipo']."' where idCardapio = ".$_POST['id'].";");
	$stmtCardapio->execute();
	
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

		<title>Editar Pizza - Mondi Pizza</title>

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

			#editCardapio{
				margin-left: 270px;
				width: 50vw;
				margin-top: 90px;
			}
			
		</style>
	</head>
	<body>
		<div id="editCardapio" class="border border-warning">
		<form action='' method=post>
		<?php
			while ($rowCardapio = $stmtCardapio->fetch(PDO::FETCH_ASSOC)) {
				echo"
						<label><b>Sabor:</b></label>
						<br>
						<input type='text' class='texto' value='".$rowCardapio['nomeCardapio']."' name=sabor required>
						<br><br>
						<label><b>Ingredientes:</b></label>
						<br>
						<input type=text class=texto value='".$rowCardapio['ingredientesCardapio']."' name=ingredientes required>
						<br><br>
						<label><b>Tamanho:</b></label>
						<br>
					";	
						echo "<input type=checkbox id=PP name=pp ";
						
						$pp = false;
						if(strpos($rowCardapio['tamanhoCardapio'], "PP") !== false){
							echo "checked>";
							$pp = true;
						}
						else
							echo ">";
						
						echo "<label for=PP>PP</label> ";
						
						echo "<input type=checkbox id=P name=p ";
						
						if($pp){//Se tem tamanho PP, começa a procurar a partir do indice 3 da String
							if(strpos($rowCardapio['tamanhoCardapio'], ","))
								if(strpos($rowCardapio['tamanhoCardapio'], "P", 3) !== false)
									echo "checked";
						}
						else
							if(strpos($rowCardapio['tamanhoCardapio'], "P") !== false)
								echo "checked";
							
						echo ">";
							
						echo "<label for=P>P</label> ";
						
						echo "<input type=checkbox id=M name=m ";
						
						if(strpos($rowCardapio['tamanhoCardapio'], "M") !== false)
							echo "checked>";
						else
							echo ">";
												
						echo "<label for=M>M</label> ";
						
						echo "<input type=checkbox id=G name=g ";
						
						if(strpos($rowCardapio['tamanhoCardapio'], "G") !== false)
							echo "checked>";
						else
							echo ">";
												
						echo "<label for=G>G</label> ";
						
						echo "<input type=checkbox id=GG name=gg ";
						
						if(strpos($rowCardapio['tamanhoCardapio'], "GG") !== false)
							echo "checked>";
						else
							echo ">";
						
						echo "<label for=GG>GG</label> ";
						
							
			echo"		<br><br>		
						<label><b>Imagem:</b></label>
						<br>
						<input type=text class=texto name=imagem value='".$rowCardapio['imagemCardapio']."'>
						<br><br>
						<label><b>Tipo de Pizza:</b></label>
						<br>
						<input type=radio id=salgada name=tipo value='Salgada'";
						if($rowCardapio['tipoCardapio'] === "Salgada")
							echo " checked";
			echo"		>
						<label for=salgada>Salgada</label><br>
						<input type=radio id=doce name=tipo value='Doce'";
						if($rowCardapio['tipoCardapio'] === "Doce")
							echo " checked";						
			echo"		>
						<label for=doce>Doce</label><br>
						<input type=hidden value=".$rowCardapio['idCardapio']." name=id>
				";
			}
		?>
		<div style="margin-top: 30px;">
			<button class="btn btn-danger" type="button" onclick="document.location = '../index.php#cardapio'">Cancelar</button>
			<button type="submit" class="btn btn-primary" name="editado">Confirmar Mudanças</button>
		</div>
		</form>
		</div>	
	<body>
	
</html>

