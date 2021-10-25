<?php 
require 'pages/header.pages.php'; 
require'classes/area.class.php';

$area = new Area();

?>
<div class="container-fluid">
		<div class="jumbotron">
			<h1>SEJA BEM VINDO A PARTE ADMINISTRATIVA</h1>
			<h2>ESCOLHA A OPÇÃO À ADMINISTRAR</h2>
		</div>
		<ul>
		<li><a href="gestao_area.php">GESTÃO DE ÁREA</a></li>
		<li><a href="gestao_sub_area.php">GESTÃO DE SUB-ÁREA</a></li>
		<li><a href="gestao_usuario.php">GESTÃO DE USUÁRIO</a></li>
		<li><a href="gestao_conteudo.php">GESTÃO DE CONTEÚDOS</a></li>
		<li><a href="gestao_arquivo_conteúdo.php">GESTÃO DE ARQUIVOS</a></li>
		</ul>
</div>

<?php
require 'pages/footer.pages.php';
?>