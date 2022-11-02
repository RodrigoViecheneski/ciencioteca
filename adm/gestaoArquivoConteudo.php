<?php
require 'pages/header.pages.php';
require 'classes/conteudo.class.php';
require 'classes/area.class.php';
require 'classes/subarea.class.php';
require 'classes/arquivo.class.php';
require __DIR__.'/vendor/autoload.php';
require 'classes/upload.class.php';
$arquivo = new Arquivo();
$conteudo = new Conteudo();
$area = new Area();
$subarea = new SubArea();

if(isset($_GET['id_conteudo']) && !empty($_GET['id_conteudo'])){
	$info = $arquivo->mostraArquivo($_GET['id_conteudo']);
	
}else{
	?>
	<script type="text/javascript">window.location.href="gestao_conteudo.php";</script>
	<?php
	exit;
}
?>


<div class="container">
    <div class="jumbotron">
        <h2>GESTÃO DE ARQUIVOS</h2>
    </div>
    <br><hr>
    <a href="adicionarArquivoConteudo.php" class="btn btn-success">CADASTRAR</a><br><hr>
	<form method="POST" enctype="multipart/form-data">
    <div class="panel panel-default">
				<div class="panel-heading">Conteúdo dos Arquivos</div>
				<div class="panel-body">
				<?php foreach($info['arquivos'] as $arq):?>
				
					<div class="foto_item">
						<img src="filesUpload/<?php echo $up['url']; ?>" class="img-thumbnail" border="0" /><br/>
						<a href="excluir_arquivo.php?id=<?php echo $up['id']; ?>" class="btn btn-default">Excluir Arquivo</a>
					</div>
				<?php endforeach;?>
				</div>
			</div>
	</form>
</div>