<?php

class Usuario {

    private $con;
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $permissoes;

    public function __construct(){
        $this->con = new Conexao();
    }
    public function addUsuario($email, $nome, $senha, $telefone, $permissoes){
        $existeEmail = $this->verificaEmail($email);
        if(count($existeEmail) == 0){
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $hash = password_hash($this->senha, PASSWORD_DEFAULT);
            $this->telefone = $telefone;
            $this->permissoes = $permissoes;
            $sql = $this->con->conectar()->prepare("INSERT INTO usuarios(nome, email, senha, telefone, permissoes)VALUES (:nome, :email, :senha, :telefone, :permissoes)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $hash);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":permissoes", $permissoes);
            $sql->execute();
            ?>
            <div class="alert alert-success">
                Cliente adicionado com sucesso!
                <a href="gestao_usuarios.php">Ver</a>
            </div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger">
                Cliente já cadastrado!
                <a href="gestao_usuarios.php">Ver</a>
            <div>
            <?php
        }
    }
    public function verificaEmail($email){
        $sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }else{
            $array = array();
        }
        return $array;
    }

    public function listarUsuarios(){
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios");
        $sql->execute();
        return $sql->fetchAll();
        echo $sql;
    }

    public function buscarUsuario($id){
        $sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }
   public function editarUsuario($id, $nome, $email, $telefone, $permissoes){
        $existEmail = $this->verificaEmail($email);
        if(count($existEmail) > 0 && $existEmail['id'] != $id){
            return FALSE;
        }else{
            $sql = $this->con->conectar()->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, permissoes = :permissoes WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":permissoes", $permissoes);
            $sql->execute();
            return TRUE;
        }
    }
    public function excluirUsuario($id){
        $sql = $this->con->conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function login($email, $senha){
        $sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return TRUE;
         } else {
            return FALSE;
         }
    }
    public function buscaPermissaoSuper($arrayperm){
        foreach($arrayperm as $item){
            if($item == "SUPER"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoAdd($arrayperm){
        foreach($arrayperm as $item){
            if($item == "ADD"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoEdit($arrayperm){
        foreach($arrayperm as $item){
            if($item == "EDIT"){
                return TRUE;
            }
        }
    }
    public function buscaPermissaoDel($arrayperm){
        foreach($arrayperm as $item){
            if($item == "DEL"){
                return TRUE;
            }
        }
    }
}


