<?php
//session_start();
include 'pages/header.pages.php';
include 'classes/subarea.class.php';

$subarea = new SubArea();
?>
<div class="container">
	<div class="jumbotron">
		<h2>GESTÃO DE SUBAREA</h2>
	</div>
<a href="adicionarSubArea.php" class="btn btn-success">CADASTRAR</a><br><br>
<table class="table table-striped"><!--border="4" width="1000" -->
	<thead>
		<tr>
			<th scope="col">ID SUBAREA</th>
			<th scope="col">NOME SUBÁREA</th>
			<th scope="col">DESCRIÇÃO SUBAREA</th>
            <th scope="col">ÁREA</th>
			<th scope="col">AÇÕES</th>
		</tr>
	</thead>
	<?php
	$lista = $subarea->listarSubArea();
	foreach ($lista as $item):
	?>
	<tbody>
		<tr>
			<td><?php echo $item['id_subarea']; ?></td>
			<td><?php echo $item['nome_subarea']; ?></td>
			<td><?php echo $item['descricao_subarea']; ?></td>
            <td><?php echo $item['nome_area']; ?></td>
			<td>
				<a href="editarSubArea.php?id_subarea=<?php echo $item['id_subarea']; ?>" class="btn btn-default">EDITAR</a>
				<a href="excluirSubArea.php?id_subarea=<?php echo $item['id_subarea'];?>" onclick="return confirm('Tem certeza que quer excluir Subárea?')" class="btn btn-danger">EXCLUIR</a>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table><br><br>
</div>