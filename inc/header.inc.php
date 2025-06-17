<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Ciencioteca</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon_io/site.webmanifest">
    <!--<link rel="stylesheet" href="/styles/style.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    
</head>

<body>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class="column">
                        <div class="column-a">
                            <a href="./" class="navbar-brand"><img src="assets/img/logo2.png" alt="Logo site ciencioteca"></a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="column-b">
                            <a href="./" class="navbar-brand"><img src="assets/img/ciencioteca.svg" alt="Logo site ciencioteca"></a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="column-c">
                            <div class="search">
                                <input class="text" type="text" placeholder="Realize sua busca aqui">
                                <input class="button" type="button">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="topnav" id="myTopnav">
            <a href="#" class="active">Início</a>
            <a href="eventos.php">Eventos</a>
            <a href="#">Contate-nos</a>
            <a href="sobre.php">Sobre</a>
            <a href="#">Ajuda</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
    </header>