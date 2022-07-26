<?php
require 'pages/header.pages.php';
require 'classes/conteudo.class.php';
require 'classes/area.class.php';
$conteudo = new Conteudo();
$a = new Area();

if (!empty($_POST['id_conteudo'])) {
    $id_conteudo = $_POST['id_conteudo'];
    $info = $conteudo->buscarConteudo($id_conteudo);
    $id_area = $_POST['id_area'];
    $infoArea = $a->buscarArea($id_area);

    if (empty($info['titulo'])) {
        header("Location: gestao_conteudo.php");
        exit;
    }
} else {
    header("Location: gestao_conteudo.php");
    exit;
}

?>

<div class="container">
    <form method="POST" action="editarConteudoSubmit.php">
        <h1>Editar Conteúdo</h1>
        <input type="hidden" name="id_conteudo" id="id_conteudo" value="<?php echo $info['id_conteudo']; ?>">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
            <label for="descricao_conteudo">Descrição Conteúdo:</label>
            <input type="text" name="descricao_conteudo" id="descricao_conteudo" class="form-control" value="<?php echo $info['descricao']; ?>">
        </div>

        <div class="form-group">
            <label for="area">Área:</label>
            <select name="id_area" id="id_area" class="form-control">
                <option value="<?php echo $id_area; ?>"><?php echo $infoArea['nome_area']; ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="subArea">Subarea:</label>
            <select name="id_subarea" id="id_subarea" class="form-control">
                <?php
                    require 'classes/subarea.class.php';
                    $sba = new SubArea();
                    $subarea = $sba->buscarSubAreaLinkArea($id_area);
                    foreach($subarea as $sbare):
                ?>
                <option value="<?php echo $sbare['id_subarea']; ?>"<?php echo ($info['id_subarea'] == $sbare['id_subarea'])?'selected="selected"':''; ?>><?php echo $sbare['nome_subarea']; ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>
        <input type="submit" value="Alterar" class="btn btn-default">
    </form>
</div>
<?php require 'pages/footer.pages.php';?>