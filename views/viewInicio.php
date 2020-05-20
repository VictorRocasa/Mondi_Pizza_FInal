<?php
require './configs/header.php';
require './configs/menu.php';

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

<div id="banner">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-color: rgba(255, 255, 255, 0.2);">
                <img src="./assets/banner/qualidadenoatendimento.png" class="rounded mx-auto img-fluid d-block imgCarrosel" alt="...">
                <div class="d-none d-md-block" style="margin-top:20px; margin-bottom:50px; text-align: center;">
                    <h5>Qualidade no atendimento</h5>
                    <p>Contamos com uma equipe pretativa que preza pela satisfação do cliente</p>
                </div>
            </div>
            <div class="carousel-item justify-content-center" style="background-color: rgba(255, 255, 255, 0.2);">
                <img src="./assets/banner/diversossabores.jpg" class="rounded mx-auto img-fluid d-block imgCarrosel" alt="...">
                <div class="d-none d-md-block" style="margin-top:20px; margin-bottom:50px; text-align: center;">
                    <h5>Diversos sabores</h5>
                    <p>Temos pizzas dos mais variados gostos</p>
                </div>
            </div>
            <div class="carousel-item" style="background-color: rgba(255, 255, 255, 0.2);">
                <img src="./assets/banner/entregarapida.png" class="rounded mx-auto img-fluid d-block  imgCarrosel" alt="...">
                <div class="d-none d-md-block" style="margin-top:20px; margin-bottom:50px; text-align: center;">
                    <h5>Rapidez na entrega</h5>
                    <p>Tenha sua pizza em até 1 hora ou ela sai de graça</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div id="sobre">

    <h5 id="Titulo"> Sobre nós </h5>

    <div id="sobreDesc">

        <?php
        while ($rowSobre = $stmtSobre->fetch(PDO::FETCH_ASSOC)) {

            echo '<p>';
            echo nl2br($rowSobre['descricaoSobre']);
            echo '</p>';
        }
        ?>
    </div>

    <div id="imagemSobre">
        <img src="./assets/sobrenos.png">
    </div>
</div>

<div id="cardapio">
    <h5 id="Titulo"> Cardápio </h5>

    <div class="row" id="cards">

        <?php
        $i = 1;
        while ($rowCardapio = $stmtCardapio->fetch(PDO::FETCH_ASSOC)) {

            $imagem = "./assets/cardapio/" . $rowCardapio['imagemCardapio'];

            if (($rowCardapio['imagemCardapio'] != '') && (file_exists($imagem))) {
                $srcImagem = $imagem;
            } else {
                $srcImagem = "./assets/cardapio/semImagem-cardapio.png";
            }

            echo '<div class="card">
                <img src="' . $srcImagem . '" class="card-img-top mx-auto rounded img-fluid d-block" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $rowCardapio['nomeCardapio'] . '</h5>
                    <p class="card-text">' . $rowCardapio['ingredientesCardapio'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Tamanhos:</b> ' . $rowCardapio['tamanhoCardapio'] . ' </li>
                </ul>
            </div>';

            $i++;
        }

        ?>
    </div>
</div>

<div id="comoComprar">

    <h5 id="Titulo"> Como comprar? </h5>

    <div id="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7748250.260686724!2d-49.95022262039282!3d-18.514195297498834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690a165324289%3A0x112170c9379de7b3!2sMinas%20Gerais!5e0!3m2!1spt-BR!2sbr!4v1589325344686!5m2!1spt-BR!2sbr" width="550" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div class="row" id="filiais">
        
    <?php
        $i = 1;
        while ($rowFiliais = $stmtFiliais->fetch(PDO::FETCH_ASSOC)) {

        echo '<div class="col-md-6" style="margin-bottom: 10px; float:left;">
                <p style="cursor: pointer;" id="rowFilial_'. $i .'" data-local="' . $rowFiliais['localFilial'] . '" data-telefone="' . $rowFiliais['telefoneFilial'] . '" data-whatsapp="' . $rowFiliais['whatsappFilial'] . '" onclick="informacoesFilial(' . $i . ')"> 
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    '. $rowFiliais['localFilial'] .'/MG
                </p>
            </div>';
        $i++;
        }
    ?>
        
    </div>
</div>

<?php

require './configs/footer.php';

?>