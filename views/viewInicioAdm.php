<?php
require './configs/header.php';
require './configs/menuAdm.php';

require_once("./daos/inicioDao.php");

$inicioConect = new InicioConect();

$stmtSobre = $inicioConect->runQuery("SELECT * FROM sobre");
$stmtSobre->execute();
$stmtCardapio = $inicioConect->runQuery("SELECT * FROM cardapio ORDER BY tipoCardapio DESC");
$stmtCardapio->execute();
$stmtFiliais = $inicioConect->runQuery("SELECT * FROM filiais ORDER BY localFilial");
$stmtFiliais->execute();
?>

<link rel="stylesheet" href="./plugins/css/inicio.css">

<script type="text/javascript" src="./plugins/js/inicio.js"></script>

<div id="sobre">

	<h5 id="Titulo">Sobre nós </h5>

	<div id="sobreDescEdit">
		<div class="form-group">
			<?php
			while ($rowSobre = $stmtSobre->fetch(PDO::FETCH_ASSOC)) {

				echo '<textarea form="editarSobre" class="form-control border border-warning" name=sobre autocomplete=off  style="height: 75vh" required>';
				echo $rowSobre['descricaoSobre'];
				echo '</textarea>';
			}
			?>
			<form method=post id="editarSobre" action="./controllers/atualizarSobreController.php">
				<div style="margin-top: 30px;">
					<button type="button" class="btn btn-danger" onclick="document.location = 'index.php#sobre'">Cancelar Mudanças</button>
					<input type="submit" class="btn btn-primary" value="Salvar Mudanças">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="cardapio">
	<h5 id="Titulo">Cardápio </h5>

	<div style="margin-top: 30px;">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th scope="col">Sabor</th>
					<th scope="col">Ingredientes</th>
					<th scope="col">Tamanhos</th>
					<th scope="col">Imagem</th>
					<th scope="col">Tipo</th>
					<th scope="col">Editar</th>
					<th scope="col">Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rowCardapio = $stmtCardapio->fetch(PDO::FETCH_ASSOC)) {
					if ($rowCardapio['imagemCardapio'] == '') {
						$rowCardapio['imagemCardapio'] = "SEM IMAGEM";
					}
					echo "<tr>
					<td>" . $rowCardapio['nomeCardapio'] . "</td>
					<td>" . $rowCardapio['ingredientesCardapio'] . "</td>
					<td>" . $rowCardapio['tamanhoCardapio'] . "</td>
					<td>" . $rowCardapio['imagemCardapio'] . "</td>
					<td>" . $rowCardapio['tipoCardapio'] . "</td>
					<td><a href=./views/viewEditarCardapio.php?id=" . $rowCardapio['idCardapio'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
					<td><a class='text-danger' href=./views/viewDeletarCardapio.php?id=" . $rowCardapio['idCardapio'] . "><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
				</tr>";
				}
				?>
			</tbody>
		</table>
		<br>

		<h6 class="btn btn-primary" onclick="document.location = './views/viewAdicionarCardapio.php'" style="cursor: pointer;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Pizzas ao Cardápio</h6>
	</div>
</div>

<div id="comoComprarEdit">

	<h5 id="Titulo">Filiais </h5>

	<div style="margin-top: 30px;">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th scope="col">Local</th>
					<th scope="col">Telefone</th>
					<th scope="col">Whatsapp</th>
					<th scope="col">Editar</th>
					<th scope="col">Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rowFiliais = $stmtFiliais->fetch(PDO::FETCH_ASSOC)) {
					echo "	  <tr>
							<td>" . $rowFiliais['localFilial'] . "</td>
							<td>" . $rowFiliais['telefoneFilial'] . "</td>
							<td>" . $rowFiliais['whatsappFilial'] . "</td>
							<td><a href=./views/viewEditarFilial.php?id=" . $rowFiliais['idFilial'] . "><i class='fa fa-pencil-square-o' aria-hidden='true'></a></td>
							<td><a class='text-danger' href=./views/viewDeletarFilial.php?id=" . $rowFiliais['idFilial'] . "><i class='fa fa-trash-o' aria-hidden='true'></a></td>
						  </tr>
					";
				}
				?>
			</tbody>
		</table>
		<br>

		<h6 class="btn btn-primary" onclick="document.location = './views/viewAdicionarFilial.php'" style="cursor: pointer;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar nova Filial</h6>
	</div>
</div>

<?php

require './configs/footer.php';

?>