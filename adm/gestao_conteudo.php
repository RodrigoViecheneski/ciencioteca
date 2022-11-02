<?php
require 'pages/header.pages.php';
require 'classes/conteudo.class.php';
require 'classes/area.class.php';
require 'classes/subarea.class.php';
$conteudo = new Conteudo();
$area = new Area();
$subarea = new SubArea();
?>
<div class="container">
  <div class="jumbotron">
    <h2>GESTÃO DE CONTEÚDO</h2>
  </div>
  <a href="adicionarConteudoArea.php" class="btn btn-success">CADASTRAR</a><br><br>
  <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TÍTULO</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">ÁREA</th>
            <th scope="col">SUBAREA</th>
            <th scope="col">USUÁRIO</th>
            <th scope="col">AÇÕES</th>
        </tr>
    </thead>
    <?php
    $lista = $conteudo->listarConteudo();
    foreach ($lista as $item):
        $nomeArea = $area->buscarAreaNome($item['id_area']);
        $nomeSubArea = $subarea->buscarSubAreaNome($item['id_subarea']);
    ?>
    <tbody>
        <tr>
            <td><?php echo $item['id_conteudo'];?></td>
            <td><?php echo $item['titulo'];?></td>
            <td><?php echo $item['descricao'];?></td>
            <td><?php echo $nomeArea['nome_area'];?></td>
            <td><?php echo $nomeSubArea['nome_subarea'];?></td>
            <td><?php echo $item['id_usuario'];?></td>
            <td>
                <a href="editarConteudoArea.php?id_conteudo=<?php echo $item['id_conteudo'];?>" class="btn btn-default">EDITAR</a>
                <a href="excluirConteudo.php?id_conteudo=<?php echo $item['id_conteudo'];?>" onclick="return confirm('Tem certeza que quer excluir conteúdo?')" class="btn btn-danger">EXCLUIR</a>
                <a href="adicionarArquivoConteudo.php?id_conteudo=<?php echo $item['id_conteudo'];?>" class="btn btn-warning">GERIR ARQUIVOS</a>
            </td>
        </tr>
    </tbody>
    <?php endforeach; ?>
  </table>  
</div>

<?php
require 'pages/footer.pages.php';
?>