<?php
require 'pages/header.pages.php';
require 'classes/subarea.class.php';
$subarea = new SubArea();

if(!empty($_POST['id_subarea'])){
	$nome_subarea = $_POST['nome_subarea'];
    $descricao_subarea = $_POST['descricao_subarea'];
	$id_area = $_POST['id_area'];
    $id_subarea = $_POST['id_subarea'];

    if(!empty($nome_subarea)){
	$subarea->editarSubArea($id_area, $nome_subarea, $descricao_subarea, $id_subarea);
    }
	header("Location: gestao_sub_area.php");
}
