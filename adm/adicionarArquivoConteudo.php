<?php
    require 'pages/header.pages.php';
    require 'classes/conteudo.class.php';
    require 'classes/arquivo.class.php';
    $arquivo = new Arquivo();
    $c = new Conteudo();
    if(!empty($_GET)){
        $id = $_GET['id_conteudo'];
        $conteudo = $c->buscarConteudo($id);
    }
    if(empty($_GET)){
        $conteudo = $c->listarConteudo();
    }
    
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
    <h1>Gestão arquivo conteúdo</h1>

    <form method="POST" action="adicionarArquivoConteudoSubmit.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <select name="id_conteudo" id="id_conteudo" class="form-control">
                <?php
                if(empty($_GET)):
                    foreach($conteudo as $cont):
                ?>
                <option value="<?php echo $cont['id_conteudo']; ?>"><?php echo $cont['titulo']; ?>
                </option>
                <?php
                    endforeach;
                endif;
                if(!empty($_GET)):
                ?>
                <option value="<?php echo $conteudo['id_conteudo']; ?>"><?php echo $conteudo['titulo']; ?>
                </option>
                <?php
                endif;
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="file">Arquivos:</label>
            <input type="file" name="arquivo[]" multiple><br />
            
            <input type="submit" value="Adicionar" class="btn btn-success" /><br /><br />
        <div class="panel panel-default">

        
				<div class="panel-heading">Conteúdo dos Arquivos</div>
				<div class="file">
                <?php if(empty($info['arquivos'])): ?>
                    <p>Não temos arquivos cadastrados ainda!</p>
                <?php else: ?>
				<?php foreach($info['arquivos'] as $arq):?>
				<div class="file-input theme-gly">
                    <div class="file-preview">
                        <button type="button" class="close fileinput-remove" aria-label="Close">
                            <span aria-hidden="true">x</span></button>
                        <div class="file-drop-zone clearfix">
                            <?php if(strtolower($arq['tipo_conteudo']) == 'png' || strtolower($arq['tipo_conteudo']) == 'jpg'):?>
                                <img src="<?php echo $arq['url_conteudo']; ?>" class="img-thumbnail" border="0" /><br/>
                            <?php endif;?>
                            <?php if(strtolower($arq['tipo_conteudo']) == 'pdf'):?>
                                <object data="<?php echo $arq['url_conteudo']; ?>" type="application/pdf" width="600" height="780">
                                <p>Seu navegador não tem um plugin para PDF</p>
                                </object>
                            <?php endif; ?>
						<a href="excluirArquivo.php?id=<?php echo $arq['id_conteudoarquivos']; ?>" class="btn btn-default">Excluir Arquivo</a>
                        </div>

                    </div>
                </div>
                    
					<!--<div class="foto_item">
						
					</div>-->
				<?php endforeach;?>
                <?php endif; ?>
				</div>
		</div>
        
    </form>
</div>
<?php require 'pages/footer.pages.php'; ?>