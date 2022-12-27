<?php
require 'pages/header.pages.php';
require_once 'classes/arquivo.class.php';

$arquivo = new Arquivo();

if(!empty($_GET['id'])){
    $id_conteudoarquivos = $_GET['id'];
    $arquivo->excluirArquivo($id_conteudoarquivos);
    header("Location: adicionarArquivoConteudo.php");
}