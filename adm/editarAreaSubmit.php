<?php
require 'pages/header.pages.php';
include 'classes/area.class.php';
$a = new Area();

if(!empty($_POST['id_area'])){
	$nome_area = $_POST['nome_area'];
    $descricao_area = $_POST['descricao_area'];
	$id_area = $_POST['id_area'];

	if(!empty($nome_area)){
		$a->editarArea($nome_area, $descricao_area, $id_area);
	}
	header("Location: gestao_area.php");
}
?>