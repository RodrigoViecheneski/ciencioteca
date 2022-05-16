<?php require 'pages/header.pages.php';



require 'classes/usuario.class.php';
$us = new Usuario();
if(isset($_POST['email']) && !empty($_POST['email'])){
	$nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $telefone = addslashes($_POST['telefone']);
    $permissoes = implode(',', $_POST['permissoes']);
	$us->addUsuario($email, $nome, $senha, $telefone, $permissoes);

}
?>

<div class="container">
	<h1>Adicionar Usuário</h1>

	<form method="POST">

		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" />
            <label for="email">Email:</label>
			<input type="email" name="email" id="email" class="form-control" />
            <label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control" />
            <label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" />

            <label for="permissoes">Permissões:</label><br>
            <input type="checkbox" id="ADD" name="permissoes[]" value="ADD">
            <label for="ADD">ADICIONAR</label><br>
            <input type="checkbox" id="EDIT" name="permissoes[]" value="EDIT">
            <label for="EDIT">EDITAR</label><br>
            <input type="checkbox" id="DEL" name="permissoes[]" value="DEL">
            <label for="DEL">DELETAR</label><br>
            <input type="checkbox" id="SUPER" name="permissoes[]" value="SUPER">
            <label for="SUPER">SUPER</label><br><br>
		</div>

		<input type="submit" value="Adicionar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>