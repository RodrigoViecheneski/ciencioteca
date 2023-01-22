<?php
require_once 'inc/header.inc.php';
require_once 'adm/classes/conexao.class.php';
require_once 'adm/classes/area.class.php';
$area = new Area();
$total_area = $area->getTotalArea();
require_once 'adm/classes/subarea.class.php';
$sarea = new SubArea();
$total_subarea = $sarea->getTotalSubarea();
require_once 'adm/classes/conteudo.class.php';
$conteudo = new Conteudo();

$conteudos = $conteudo->getUltimosConteudos();
$filtro = array(
    'area' => ''
);
if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
}
$total_conteudo = $conteudo->getTotalConteudo($filtro);
// criar paginação
$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])){
    $p = addslashes($_GET['p']);
}
$por_pagina = 4;
$total_paginas = ceil($total_conteudo / $por_pagina); //ceil arredonda para cima 
//fim paginação
$total_conteudos_filtro = $conteudo->getTotalConteudosFiltro($p, $por_pagina, $filtro);
$areas = $area->listarArea();
?>
<section class="info">
    <div class="column-a">
        <div class="image-a"></div>
        <div class="image-b"></div>
    </div>
    <div class="column-b">
        <h3>Esta Ciencioteca apresenta sequências didáticas, jogos, roteiros de experimentos e modelos didáticos elaborados a partir de um projeto extensionista de formação continuada de professores, envolvendo docentes de Ciências de Escolas Estaduais de Irati e acadêmicos da Licenciatura em Química do IFPR-Campus Irati</h3>
    </div>
    <div class="column-c">
        <div class="container-fluid">
            <div class="jumbotron">
                <img src="assets/img/plancheta.png">
                <h1>Estatísticas</h1>
                <h3>Atualmente temos <?php echo $total_conteudo; ?> conteúdos postados.</h3>
                <p>Em <?php echo $total_subarea; ?> subáreas</p>
                <p>E <?php echo $total_area; ?> áreas</p>
            </div>
        </div>
    </div>
</section>

<section class="ultimos">
    <?php foreach ($conteudos as $cont) : ?>
        <div>
            <div class="image">
                <?php if (!empty($cont['url'])) : ?>
                    <img src="adm/<?php echo $cont['url']; ?>" />
                <?php else : ?>
                    <img src="assets/img/img-roteiro-eletricidade.svg">
                <?php endif; ?>
            </div>
            <div class="text">
                <p>CONTEÚDO:</p>
                <p class="conteudo"><?php echo $cont['titulo']; ?></p>
                <p>ÁREA:</p>
                <p class="area"><?php echo $cont['area']; ?></p>
                <!--<p>DETALHES:</p>
                <p class="detalhes"><?php// echo $cont['descricao']; ?></p>
                <!--<input class="submit" type="submit" name="acesse" value="ACESSE">-->
                <a href="mostraArquivosConteudo.php?id_conteudo=<?php echo $cont['id_conteudo']; ?>" class="submit">ACESSE</a>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<br>
<section class="buscar">
    <div class="column-a">
        <img src="assets/img/lupa.png">
        <form method="GET">
            <h2>Buscar:</h2><br>
            <div class="form-group">
                <label for="area">Área:</label><br>
                <select id="id_area" name="filtro[area]">
                    <option></option>
                    <?php foreach ($areas as $ar) : ?>
                        <option value="<?php echo $ar['id_area']; ?>" <?php echo ($ar['id_area'] == $filtro['area']) ? 'selected="selected"' : ''; ?>><?php echo $ar['nome_area']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Buscar">
            </div>
        </form>
    </div>
    <div class="jumbotron">
        <h2>Conteúdos:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TÍTULO</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">ÁREA</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <?php
           // $lista = $conteudo->listarConteudo();
            foreach ($total_conteudos_filtro as $item) :
               

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $item['id_conteudo']; ?></td>
                        <td><?php echo $item['titulo']; ?></td>
                        <td><?php echo $item['descricao']; ?></td>
                        <td><?php echo $item['area']; ?></td>
                        <td>
                            <a href="mostraArquivosConteudo.php?id_conteudo=<?php echo $item['id_conteudo']; ?>" class="btn btn-warning">Visualizar arquivos</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
        <ul class="pagination">
        <?php for($q=1; $q<=$total_paginas; $q++):?>
            <li class="<?php echo($p == $q)?'active':''; ?>"><a href="index.php?<?php
            $w = $_GET;
            $w['p'] = $q;
            echo http_build_query($w);
            ?>"><?php echo $q; ?></a></li>
        <?php endfor; ?>
    </ul>
    </div>
</section>

<?php
require_once 'inc/footer.inc.php';
?>