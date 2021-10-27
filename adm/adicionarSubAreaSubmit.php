<?php
require 'pages/header.pages.php';
require 'classes/subarea.class.php';
$sa = new SubArea();
if(!empty($_POST['nome_subarea'])){
	$nome_subarea = addslashes($_POST['nome_subarea']);
	$descricao_subarea = addslashes($_POST['descricao_subarea']);
    $id_area = addslashes($_POST['id_area']);

	$sa->addSubArea($nome_subarea, $descricao_subarea, $id_area);
    header('Location: gestao_sub_area.php');
}else{
    echo '<script type="text/javascript">alert("Subárea já cadastrada!");</script>';
}


?>