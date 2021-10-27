<?php 
require 'pages/header.pages.php';
?>
<div class="container">
	<h1>Adicionar Subarea</h1>

	<form method="POST" action="adicionarSubAreaSubmit.php" >
        

		<div class="form-group">
			<label for="nome_subarea">Nome Subarea:</label>
			<input type="text" name="nome_subarea" id="nome_subarea" class="form-control" />
            <label for="descriçao_subarea">Descrição Subarea:</label>
			<input type="text" name="descricao_subarea" id="descricao_subarea" class="form-control" />
		</div>

        <div class="form-group">
			<label for="area">Área:</label>
			<select name="id_area" id="id_area" class="form-control">
				<?php
					require 'classes/area.class.php';
					$a = new Area();
					$area = $a->listarArea();
					foreach ($area as $are):
				?>
				<option value="<?php echo $are['id_area']; ?>"><?php echo $are['nome_area']; ?>
				</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
		

		<input type="submit" value="Adicionar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>