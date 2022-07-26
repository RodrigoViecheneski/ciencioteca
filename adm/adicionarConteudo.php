<?php require 'pages/header.pages.php';
require 'classes/area.class.php';
//session_start();
$a = new Area();
$id_area = $_POST['id_area'];
$info = $a->buscarArea($id_area);

?>


<div class="container">
<h1>Adicionar conteudo</h1>


<form method="POST" action="adicionarConteudoSubmit.php">

    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" />
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" />

		<div class="form-group">
		<label for="area">Area:</label>
			<select name="id_area" id="id_area" class="form-control">
				<option value="<?php echo $info['id_area']; ?>"><?php echo $info['nome_area']; ?>
				</option>
			</select>
		</div>

        <div class="form-group">
			<label for="subArea">Subarea:</label>
			<select name="id_subarea" id="id_subarea" class="form-control">
				<?php
					require 'classes/subarea.class.php';
					$sba = new SubArea();
					$subarea = $sba->buscarSubAreaLinkArea($id_area);
					foreach ($subarea as $sbare):
				?>
				<option value="<?php echo $sbare['id_subarea']; ?>"><?php echo $sbare['nome_subarea']; ?>
				</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
    </div>

    <input type="submit" value="Adicionar" class="btn btn-default" />
</form>

</div>

<?php require 'pages/footer.pages.php'?>