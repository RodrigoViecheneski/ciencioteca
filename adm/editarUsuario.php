<?php 
require 'pages/header.pages.php';
include 'classes/usuario.class.php';
$us = new Usuario();
if(!empty($_GET['id'])){
	$id = $_GET['id'];

	$info = $us->buscarUsuario($id);
	$array = explode(",", $info['permissoes']);
	print_r($array);
	exit;
	if(empty($info['nome'])){
		header("Location: gestao_usuarios.php");
		exit;
	}

}else{
	header("Location: gestao_usuarios.php");
	exit;
}

?>

<div class="container">
	<h1>Editar Usuário</h1>

	<form method="POST" action="editarUsuarioSubmit.php">

		<div class="form-group">
			<input type="hidden" name="id" id="id" value="<?php echo $info['id']; ?>">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control" value="<?php echo $info['nome']; ?>" />
            <label for="email">Email:</label>
			<input type="email" name="email" id="email" class="form-control" value="<?php echo $info['email']; ?>" />
            
            <label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $info['telefone']; ?>" />

            <label for="permissoes">Permissões:</label><br>
			<input type="text" name="permissoes" id="permissoes" class="form-control" value="<?php echo $info['permissoes']; ?>" />
            
		</div>

		<input type="submit" value="Editar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>