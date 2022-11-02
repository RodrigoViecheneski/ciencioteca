<?php
class Arquivo {
    private $id_conteudoarquivo;
    private $id_conteudo;
    private $url_conteudo;
    private $tipo_conteudo;

    public function __construct(){
        $this->con = new Conexao();
    }
    public function inserirArquivoBanco($id_conteudo, $url_conteudo, $tipo_conteudo){
        $this->id_conteudo = $id_conteudo;
        $this->url_conteudo = $url_conteudo;
        $this->tipo_conteudo = $tipo_conteudo;

        $sql = $this->con->conectar()->prepare("INSERT INTO conteudoarquivos (id_conteudo, url_conteudo, tipo_conteudo) VALUES (:id_conteudo, :url_conteudo, :tipo_conteudo)");
        $sql->bindValue(":id_conteudo", $id_conteudo);
        $sql->bindValue(":url_conteudo", $url_conteudo);
        $sql->bindValue(":tipo_conteudo", $tipo_conteudo);
        $sql->execute();
        ?>
        <div class="alert alert-success">
            Arquivo adicionado com sucesso!
            <a href="gestao_conteudo.php">VER</a>
        </div>
        <?php	
    }
    public function conteudoArquivo($id_conteudo){
        $array = array();
        $this->id_conteudo = $id_conteudo;
        $sql = $this->con->conectar()->prepare("SELECT 
        *,
        (select conteudoarquivos.url_conteudo from conteudoarquivos where conteudoarquivos.id_conteudo = conteudo = id_conteudo limit 1) as url 
         FROM conteudo 
         WHERE id_conteudo = :id_conteudo");
         $sql->bindValue("id_conteudo", $id_conteudo);
         $sql->execute();

         if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
         }
         return $array;
    }
    public function mostraArquivo($id_conteudo){
        $array = array();
        $this->id_conteudo = $id_conteudo;
        $sql = $this->con->conectar()->prepare("SELECT * FROM conteudoarquivos WHERE id_conteudo = :id_conteudo");
        $sql->bindValue("id_conteudo", $id_conteudo);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
            //mostrar arquivos cadastrados
            $array['arquivos'] = array();
            $sql = $this->con->conectar()->prepare("SELECT id_conteudoarquivos, url_conteudo FROM conteudoarquivos WHERE id_conteudo = :id_conteudo");
            $sql->bindValue(":id_conteudo", $id_conteudo);
            $sql->execute();
            if($sql->rowCount() > 0){
                $array['arquivos'] = $sql->fetchAll();
            }
        }
        return $array;
    }
}