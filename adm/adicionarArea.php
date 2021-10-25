<?php require 'pages/header.pages.php';



require 'classes/area.class.php';
$a = new Area();
if(isset($_POST['nome']) && !empty($_POST['nome'])){
	$nome = addslashes($_POST['nome']);

	$a->addArea($nome);

}
?>

<div class="container">
	<h1>Adicionar Area</h1>

	<form method="POST">

		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" /><!--value="<?php echo $info['titulo']; ?>"-->
		</div>

		<input type="submit" value="Adicionar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>