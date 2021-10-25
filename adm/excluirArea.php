<?php
require 'pages/header.pages.php';
include 'classes/area.class.php';

$a = new Area();

if(!empty($_GET['id_area'])){
	$id = $_GET['id_area'];
	$a->excluirArea($id);
    header("Location: gestao_area.php");
}
?>