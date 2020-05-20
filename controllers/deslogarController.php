<?php
	session_start();
	//quando essa pagina e chamada da administracao ela termina a sessao e redireciona para a pagina principal
    unset($_SESSION['adm_session']);
	header('Location:../index.php');
?>
