<?php require 'pages/header.pages.php';



require 'classes/area.class.php';
$a = new Area();
if(isset($_POST['nome_area']) && !empty($_POST['nome_area'])){
	$nome_area = addslashes($_POST['nome_area']);
    $descricao_area = addslashes($_POST['descricao_area']);
	$a->addArea($nome_area, $descricao_area);

}
?>

<div class="container">
	<h1>Adicionar Area</h1>

	<form method="POST">

		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome_area" id="nome_area" class="form-control" />
            <label for="nome">Descrição Área:</label>
			<input type="text" name="descricao_area" id="descricao_area" class="form-control" />
		</div>

		<input type="submit" value="Adicionar" class="btn btn-danger" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>