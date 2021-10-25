<?php
//session_start();
include 'pages/header.pages.php';
include 'classes/area.class.php';

$area = new Area();
?>
<div class="container">
	<div class="jumbotron">
		<h2>GESTÃO DE ÁREA</h2>
	</div>
<a href="adicionarArea.php" class="btn btn-success">CADASTRAR</a><br><br>
<table class="table table-striped"><!--border="4" width="1000" -->
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">NOME ÁREA</th>
			<th scope="col">AÇÕES</th>
		</tr>
	</thead>
	<?php
	$lista = $area->listarArea();
	foreach ($lista as $item):
	?>
	<tbody>
		<tr>
			<td><?php echo $item['id_area']; ?></td>
			<td><?php echo $item['nome_area']; ?></td>
			<td>
				<a href="editarArea.php?id_area=<?php echo $item['id_area']; ?>" class="btn btn-default">EDITAR</a>
				<a href="excluirArea.php?id_area=<?php echo $item['id_area'];?>" onclick="return confirm('Tem certeza que quer excluir área?')" class="btn btn-danger">EXCLUIR</a>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table><br><br>
</div>
