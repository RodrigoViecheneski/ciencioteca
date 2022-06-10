<?php
require 'pages/header.pages.php';
include 'classes/area.class.php';
include 'classes/subarea.class.php';

$a = new Area();
$sa = new SubArea();

if(!empty($_POST['id_area'])){
	$nome_area = $_POST['nome_area'];
    $descricao_area = $_POST['descricao_area'];
	$id_area = $_POST['id_area'];
	$verificaArea = $sa->verificaLinkArea($id_area);
	if (!$verificaArea) {
		if(!empty($nome_area)){
			$a->editarArea($nome_area, $descricao_area, $id_area);
			header("Location: gestao_area.php");
		}
	
	}else{
		?>
		<div class="alert alert-danger">
			Existem subareas ligadas a essa área! Não pode ser alterada!
			<a href="gestao_sub_area.php">Ver</a>
		</div>
		<?php
	}
}
?>