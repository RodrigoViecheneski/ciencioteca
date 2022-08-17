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
            <a href="gestao_arquivo_conteudo.php">VER</a>
        </div>
        <?php	
    }
}