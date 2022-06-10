<?php
require 'pages/header.pages.php';
require 'classes/usuario.class.php';

$u = new Usuario();

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $permissoes = implode(',', $_POST['permissoes']);
}
if(!empty($nome)){
    $result = $u->editarUsuario($id, $nome, $email, $telefone, $permissoes);
    if($result){
        header("Location:gestao_usuarios.php");
    }
    else{
        ?>
        <div class="alert alert-danger">
            Usuário não pode ser alterado. E-mail de usuário já cadastrado!
            <a href="gestao_usuarios.php">Ver</a>
        </div>
        <?php
    }
}
?>