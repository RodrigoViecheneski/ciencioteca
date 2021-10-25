<?php 
require "pages/header.pages.php";

include 'classes/area.class.php';
$a = new Area();

if(!empty($_GET['id_area'])){
	$id = $_GET['id_area'];

	$info = $a->buscarArea($id);
	if(empty($info['id_area'])){
		header("Location: gestao_area.php");
		exit;
	}

}else{
	header("Location: gestao_area.php");
	exit;
}

?>
<div class="container">
	<form method="POST" action="editarAreaSubmit.php">

		<h1>Editar area</h1>

		<input type="hidden" name="id_area" id="id_area" value="<?php echo $info['id_area'];?>">

		<div class="form-group">
			<Label for="nome">Nome:</Label><br>
			<input type="text" name="nome_area" id="nome_area" class="form-control" value="<?php echo $info['nome_area'];?>">
		</div>
		<input type="submit" value="Editar" class="btn btn-default"><br><br>

	</form>
</div>

<?php require "pages/footer.pages.php"?>
