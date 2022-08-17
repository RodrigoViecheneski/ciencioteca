<?php
    require 'pages/header.pages.php';
    require 'classes/conteudo.class.php';
    $c = new Conteudo();
    if(!empty($_GET)){
        $id = $_GET['id_conteudo'];
        $conteudo = $c->buscarConteudo($id);
    }
    if(empty($_GET)){
        $conteudo = $c->listarConteudo();
    }
?>

<div class="container">
    <h1>Adicionar arquivo a um conteúdo</h1>

    <form method="POST" action="adicionarArquivoConteudoSUbmit.php" enctype="multipart/form-data">
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
            <input type="file" name="arquivo[]" multiple>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-success" />
    </form>
</div>
<?php require 'pages/footer.pages.php'; ?>