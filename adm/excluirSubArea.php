<?php
require 'pages/header.pages.php';
include 'classes/subarea.class.php';

$subarea = new SubArea();

if(!empty($_GET['id_subarea'])){
	$id_subarea = $_GET['id_subarea'];
	$subarea->excluirSubArea($id_subarea);
    header("Location: gestao_sub_area.php");
}
?>