<?php
ob_start();

require_once('classes/Obitos.class.php');
require_once('classes/Concessionario.class.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cemitério</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">

	<link rel="shortcut icon" href="arquivos/favicon.ico"/>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Início</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="?p=concessionarios">Concessionários</a>
			</li>				
			<li class="nav-item">
				<a class="nav-link" href="?p=perfil">Protótipo Perfil Concessionário</a>
			</li>			
		</ul>
	</nav>