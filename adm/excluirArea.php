<?php
require 'pages/header.pages.php';
include 'classes/area.class.php';
include 'classes/subarea.class.php';

$a = new Area();
$sa = new SubArea();


if(!empty($_GET['id_area'])){
	$id = $_GET['id_area'];
	$verificaArea = $sa->verificaLinkArea($id);
	if(!$verificaArea){
		$a->excluirArea($id);
    		header("Location: gestao_area.php");
	}else{
		?>
		<div class="alert alert-danger">
			Existem subareas ligadas a essa área! Não pode ser excluida!
			<a href="gestao_sub_area.php">Ver</a>
		</div>
		<?php
	}
	
}else{
	echo '<script type="text/javascript">alert("Item com dependência entre tabelas!");</script>';
}
?>