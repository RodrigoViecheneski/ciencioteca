<?php
require_once 'inc/header.inc.php';
require_once 'adm/classes/conexao.class.php';
require_once 'adm/classes/area.class.php';
require_once 'adm/classes/subarea.class.php';
require_once 'adm/classes/conteudo.class.php';
require_once 'adm/classes/arquivo.class.php';
$area = new Area();
$sarea = new SubArea();
$conteudo = new Conteudo();
$arquivo = new Arquivo();
if(!empty($_GET)){
	$id = $_GET['id_conteudo'];
	$conteudos = $conteudo->getConteudo($_GET['id_conteudo']);
}
if(isset($_GET['id_conteudo']) && !empty($_GET['id_conteudo'])){
	$info = $arquivo->mostraArquivo($_GET['id_conteudo']);
	
}else{
	?>
	<script type="text/javascript">window.location.href="index.php";</script>
	<?php
	exit;
}

?>
<div class="container">
	<div class="jumbotron">
		<h2><?php echo $conteudos['titulo']; ?></h2>

		<p>Descrição: <?php echo $conteudos['descricao']; ?></p>
		<p>Área: <?php echo $conteudos['area']; ?></p>
		<hr>
		<div class="panel panel-default">
                <div class="panel-heading">Conteúdo dos Arquivos</div>
                <div class="file">
                    <?php if (empty($info['arquivos'])) : ?>
                        <p>Não temos arquivos cadastrados ainda!</p>
                    <?php else : ?>
                        <?php foreach ($info['arquivos'] as $arq) : ?>
                            <div class="file-input theme-gly">
                                <div class="file-preview">   
                                    <div class="file-drop-zone clearfix">
                                        <?php if (strtolower($arq['tipo_conteudo']) == 'png' || strtolower($arq['tipo_conteudo']) == 'jpg') : ?>
                                            <img src="adm/<?php echo $arq['url_conteudo']; ?>" class="img-thumbnail" border="0" /><br />
                                        <?php endif; ?>
                                        <?php if (strtolower($arq['tipo_conteudo']) == 'pdf') : ?>
                                            <object data="adm/<?php echo $arq['url_conteudo']; ?>" type="application/pdf" width="600" height="780">
                                                <p>Seu navegador não tem um plugin para PDF</p>
                                            </object>
                                        <?php endif; ?>
                                       <br><hr><br>
                                    </div>

                                </div>
                            </div>

                            <!--<div class="foto_item">
						
					</div>-->
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
	</div>
</div>
<?php
require_once 'inc/footer.inc.php';
?>