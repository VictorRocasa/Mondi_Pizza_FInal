<?php
	require_once("../daos/editarDao.php");
	
	$editarConect = new EditarConect();
	
	$stmtSobre = $editarConect->runQuery("UPDATE sobre SET descricaoSobre = '" . $_POST['sobre'] . "' where idSobre = 1;");
	$stmtSobre->execute();
	header('Location:../index.php');
?>