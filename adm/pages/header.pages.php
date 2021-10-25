<!DOCTYPE html>
<?php
 require 'classes/conexao.class.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ciencioteca</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand">Home</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin'])&& !empty($_SESSION['cLogin'])):?>
					<!--li><a href="mostrar-usuarios.php">Gestão</a></li-->
					<li><a href="minhas-publicacoes.php">Minhas Publicação</a></li>
					<li><a href="gestao.php">Gestão</a></li>
					<li><a href="add-publicacao.php">Adicionar Publicação</a></li>
					<!--li><a href="minhaConta.php">Minha Conta</a></li-->
					<li><a href="sair.php">Sair</a></li>
				<?php else: ?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
				<?php endif; ?>
				
			</ul>
		</div>
	</nav>