<?php
require 'pages/header.pages.php';
require 'classes/upload.class.php';
require 'classes/arquivo.class.php';
require __DIR__.'/vendor/autoload.php';

$arquivo = new Arquivo();
/*echo "<pre>";
print_r($_FILES);
echo "<pre>";
exit;*/
if(isset($_FILES)){
    $uploads = Upload::createMultiUpload($_FILES['arquivo']);

    foreach($uploads as $obUpload){
        $obUpload->generateBasename();
        $sucesso = $obUpload->upload('/filesUpload', false);
        if($sucesso){
            $id_conteudo = $_POST['id_conteudo'];
            $url_conteudo = $obUpload->getPath();
            $tipo_conteudo = $obUpload->getExtension();
            $arquivo->inserirArquivoBanco($id_conteudo, $url_conteudo, $tipo_conteudo);
            continue;
        }
        echo('problema <br>');
    }
    exit;
}
require 'pages/footer.pages.php';
?>