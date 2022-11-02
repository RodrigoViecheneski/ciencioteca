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
<?php require 'pages/footer.pages.php'; ?>