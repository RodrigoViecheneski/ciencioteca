<?php
require 'pages/header.pages.php';
session_start();
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php
    exit;
    }
require 'classes/conteudo.class.php';


$conteudo = new Conteudo();

if(!empty($_POST['titulo'])){
    $titulo = addslashes($_POST['titulo']);
    $descricao = addslashes($_POST['descricao']);
    $id_area = addslashes($_POST['id_area']);
    $id_subarea = addslashes($_POST['id_subarea']);
    $id_usuario = addslashes($_SESSION['cLogin']);

    $conteudo->addConteudo($titulo, $descricao, $id_area, $id_subarea, $id_usuario);
    header('Location: gestao_conteudo.php');

}else{
    echo '<script type="text/javascript">alert("Conteúdo ja cadastrado!");</script>';
}
?>