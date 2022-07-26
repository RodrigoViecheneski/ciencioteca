<?php

require 'pages/header.pages.php';
include 'classes/conteudo.class.php';

$conteudo = new Conteudo();

if(!empty($_POST['id_conteudo'])){
    $id_conteudo = addslashes($_POST['id_conteudo']);
    $titulo = addslashes($_POST['titulo']);
    $descricao_conteudo = addslashes($_POST['descricao_conteudo']);
    $id_area = addslashes($_POST['id_area']);
    $id_subarea = addslashes($_POST['id_subarea']);
    $id_usuario = addslashes($_POST['id_usuario']);

    $conteudo->editarConteudo($id_conteudo, $titulo, $descricao_conteudo, $id_area, $id_subarea, $id_usuario );
    header('Location: gestao_conteudo.php');
}else{
    echo '<script type="text/javascript">alert("Ocorreu um problema na alteração!");</script>';
}
?>