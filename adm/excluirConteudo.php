<?php

require 'pages/header.pages.php';
include 'classes/conteudo.class.php';

$conteudo = new Conteudo();

if(!empty($_GET['id_conteudo'])){
    $id_conteudo = $_GET['id_conteudo'];
    $conteudo->excluirConteudo($id_conteudo);
    header("Location: gestao_conteudo.php");
}