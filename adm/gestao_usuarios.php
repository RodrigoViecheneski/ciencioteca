<?php
//session_start();
include 'pages/header.pages.php';
include 'classes/usuario.class.php';

$us = new Usuario();
?>
<div class="container">
	<div class="jumbotron">
		<h2>GESTÃO DE USUÁRIOS</h2>
	</div>
<a href="adicionarUsuario.php" class="btn btn-success">CADASTRAR</a><br><br>
<table class="table table-striped"><!--border="4" width="1000" -->
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">NOME </th>
			<th scope="col">EMAIL</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">PERMISSÕES</th>
			<th scope="col">AÇÕES</th>
		</tr>
	</thead>
	<?php
	$lista = $us->listarUsuarios();
	foreach ($lista as $item):
	?>
	<tbody>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['nome']; ?></td>
			<td><?php echo $item['email']; ?></td>
            <td><?php echo $item['telefone']; ?></td>
            <td><?php echo $item['permissoes']; ?></td>
			<td>
				<a href="editarUsuario.php?id=<?php echo $item['id']; ?>" class="btn btn-default">EDITAR</a>
				<a href="excluirUsuario.php?id=<?php echo $item['id'];?>" onclick="return confirm('Tem certeza que quer excluir usuário?')" class="btn btn-danger">EXCLUIR</a>
			</td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table><br><br>
</div>
