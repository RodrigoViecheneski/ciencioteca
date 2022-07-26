<?php 
require 'pages/header.pages.php';
require 'classes/conteudo.class.php';
$conteudo = new Conteudo();
if(!empty($_GET['id_conteudo'])){
    $id_conteudo = $_GET['id_conteudo'];
    $info = $conteudo->buscarConteudo($id_conteudo);

    if(empty($info['titulo'])){
        header("Location: gestao_conteudo.php");
        exit;
    }
}else{
    header("Location: gestao_conteudo.php");
    exit;
}
?>

<div class="container">
<h1>Escolha a área referente ao seu conteúdo!</h1>

<form method="POST" action="editarConteudo.php">
    <input type="hidden" value="<?php echo $info['titulo'];?>" name="titulo">
    <input type="hidden" value="<?php echo $info['descricao'];?>" name="descricao">
    <input type="hidden" value="<?php echo $info['id_subarea'];?>" name="id_subarea">
    <input type="hidden" value="<?php echo $info['id_conteudo'];?>" name="id_conteudo">

    <input type="hidden" value="<?php echo $info['id_usuario'];?>" name="id_usuario">
    <div class="form-group">
        <label for="area">Área</label>
        <select name="id_area" id="id_area" class="form-control">
            <?php
                require 'classes/area.class.php';
                $a = new Area();
                $area = $a->listarArea();
                foreach($area as $are):
            ?>
            <option value="<?php echo $are['id_area']; ?>"<?php echo ($info['id_area'] == $are['id_area'])?'selected="selected"':''; ?>><?php echo $are['nome_area']; ?></option>
            <?php
                endforeach;
            ?>
        </select>
    </div>

    <input type="submit" value="Confirmar" class="btn btn-default">

</form>
</div>