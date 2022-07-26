<?php 
//session_start();
require 'pages/header.pages.php'; 
require'classes/area.class.php';
//require 'classes/usuario.class.php';
$area = new Area();

if(empty($_SESSION['cLogin'])){
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	//header("Location: login.php");
	exit;
}

?>
<div class="container-fluid">
		<div class="jumbotron">
			<h1>SEJA BEM VINDO A PARTE ADMINISTRATIVA</h1>
			<h2>ESCOLHA A OPÇÃO À ADMINISTRAR</h2>
		</div>
		<ul>
		<li><a href="gestao_area.php">GESTÃO DE ÁREA</a></li>
		<li><a href="gestao_sub_area.php">GESTÃO DE SUB-ÁREA</a></li>
		<li><a href="gestao_usuarios.php">GESTÃO DE USUÁRIO</a></li>
		<li><a href="gestao_conteudo.php">GESTÃO DE CONTEÚDOS</a></li>
		<li><a href="gestao_arquivo_conteúdo.php">GESTÃO DE ARQUIVOS</a></li>
		</ul>
</div>

<?php
require 'pages/footer.pages.php';
?>