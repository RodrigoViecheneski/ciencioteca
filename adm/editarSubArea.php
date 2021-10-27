<?php 
require 'pages/header.pages.php';
require 'classes/subarea.class.php';
$subarea = new SubArea();
if(isset($_GET['id_subarea']) && !empty($_GET['id_subarea'])){
    $id_subarea = $_GET['id_subarea'];
    $info = $subarea->buscarSubArea($id_subarea);
    if(empty($info['nome_subarea'])){
       // header("Location: gestao_sub_area.php");
        //exit;
    }
}else{
    header("Location: gestao_sub_area.php");
    exit;
}
?>
<div class="container">
	<h1>Editar Subárea</h1>

	<form method="POST" action="editarSubAreaSubmit.php" >
        

		<div class="form-group">
			<label for="nome_subarea">Nome Subarea:</label>
			<input type="text" name="nome_subarea" id="nome_subarea" class="form-control" value="<?php echo $info['nome_subarea']; ?>">
            <label for="descriçao_subarea">Descrição Subarea:</label>
			<input type="text" name="descricao_subarea" id="descricao_subarea" class="form-control" value="<?php echo $info['descricao_subarea']; ?>">
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
				<option value="<?php echo $are['id_area']; ?>"<?php echo ($info['id_area'] == $are['id_area'])?'selected="selected"':''; ?>><?php echo $are['nome_area']; ?>
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