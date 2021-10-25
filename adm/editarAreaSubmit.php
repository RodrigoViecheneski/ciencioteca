<?php
require 'pages/header.pages.php';
include 'classes/area.class.php';
$a = new Area();

if(!empty($_POST['id_area'])){
	$nome_area = $_POST['nome_area'];
	$id_area = $_POST['id_area'];

	if(!empty($id_area)){
		$a->editarArea($nome_area, $id_area);
	}
	//header("Location: gestao_area.php");
}
?>