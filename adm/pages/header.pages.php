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
	<!-- Chamada para apresentar as informações de arquivos-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand"><img src="assets/img/ciencioteca.png" alt="Logo site ciencioteca" width="30%"></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin'])&& !empty($_SESSION['cLogin'])):?>
					<li><a href="minhas_publicacoes.php">Minhas Publicações</a></li>
					<li><a href="sair.php">Sair</a></li>
				<?php else: ?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
				<?php endif; ?>
				
			</ul>
		</div>
	</nav>