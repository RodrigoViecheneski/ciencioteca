<?php 
require 'pages/header.pages.php';
include 'classes/usuario.class.php';
$us = new Usuario();
if(!empty($_GET['id'])){
	$id = $_GET['id'];

	$info = $us->buscarUsuario($id);
	if(empty($info['nome'])){
		header("Location: gestao_usuarios.php");
		exit;
	}
	$arrayperm = explode(",", $info['permissoes']);


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
            <?php if($us->buscaPermissaoAdd($arrayperm)):?>
				<input type="checkbox" name="permissoes[]" id="ADD" value="ADD" checked/>
            	<label for="ADD">ADICIONAR</label><br>
        	<?php endif;?>
        	<?php if(empty($us->buscaPermissaoAdd($arrayperm))):?>
        		<input type="checkbox" name="permissoes[]" id="ADD" value="ADD">
        		<label for="ADD">ADICIONAR</label><br>
        	<?php endif; ?>

        	<?php if($us->buscaPermissaoEdit($arrayperm)):?>
				<input type="checkbox" name="permissoes[]" id="EDIT"  value="EDIT" checked/>
            	<label for="EDIT">EDITAR</label><br>
        	<?php endif;?>
        	<?php if(empty($us->buscaPermissaoEdit($arrayperm))):?>
        		<input type="checkbox" name="permissoes[]" id="EDIT" value="EDIT">
        		<label for="EDIT">EDITAR</label><br>
        	<?php endif; ?>

        	<?php if($us->buscaPermissaoDel($arrayperm)):?>
				<input type="checkbox" name="permissoes[]" id="DEL" value="DEL" checked/>
            	<label for="DEL">DELETAR</label><br>
        	<?php endif;?>
        	<?php if(empty($us->buscaPermissaoDel($arrayperm))):?>
        		<input type="checkbox" name="permissoes[]" id="DEL" value="DEL">
        		<label for="DEL">DELETAR</label><br>
        	<?php endif; ?>

        	<?php if($us->buscaPermissaoSuper($arrayperm)):?>
				<input type="checkbox" name="permissoes[]" id="SUPER" value="SUPER" checked/>
            	<label for="SUPER">SUPER</label><br>
        	<?php endif;?>
        	<?php if(empty($us->buscaPermissaoSuper($arrayperm))):?>
        		<input type="checkbox" name="permissoes[]" id="SUPER" value="SUPER">
        		<label for="SUPER">SUPER</label><br>
        	<?php endif; ?>
		</div>

		<input type="submit" value="Editar" class="btn btn-default" />
	</form>

</div>
<?php require 'pages/footer.pages.php'?>