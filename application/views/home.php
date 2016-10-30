<input type="date" name="name" value="">

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Controle de Nascentes</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/jumbotron.css') ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Controle de Nascentes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" action="<?= site_url('Usuario/realizarLogin') ?>" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Email..." class="form-control" name="email">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Senha..." class="form-control" name="senha">
                </div>
                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<?php echo validation_errors(); ?>
<?php if ($this->input->get('aviso') == 1) { ?>
    <div class="col-sm-12">
        <br>
        <div class="alert alert-danger alert-dismissible fade in col-sm-6 col-sm-offset-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Erro !</strong> Erro ao logar, email ou senha inválidos!!!
        </div>
    </div>
<?php } ?>

<div class="jumbotron">
    <div class="container">
        <h1>Sistema de Controle de Nascentes</h1>
        <p>Cadastro e informações sobre nascentes de rios e córregos de fácil acesso e manuseio.</p>
        <p><a class="btn btn-primary btn-lg" href="<?= site_url('Usuario/carregaCadastrarUsuario') ?>" role="button">Desejo
                me cadastrar &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Nascentes cadastradas</h2>
            <p>Permite aos usuários cadastrar e atualizar informações sobre novas nascentes e visualizar um mapa com
                localização GPS das nascentes no sistema. Com função de busca por cidades. Utilizando a API do Google
                Maps.</p>
            <img class="img-responsive" src="<?= base_url('assets/imgs/maps.jpg') ?>"
                 alt="Mapa do google maps com exemplo"/>
        </div>
        <div class="col-md-4">
            <h2>Rios, córregos e nascentes</h2>
            <p>Importante para controle e mapeamento do fluxo de água de pequenos e grandes rios, fiscalização
                ambiental, cadastro de nascentes atualizadas e informativo à interessados sobre as nascentes de
                determinada região.</p>
            <img class="img-responsive" src="<?= base_url('assets/imgs/rios.png') ?>"
                 alt="Mapa do google maps com exemplo"/>
        </div>
        <div class="col-md-4">
            <h2>Preservação</h2>
            <p>Hoje a legislação brasileira possui diversas leis sobre questões ambientais e florestais referentes às
                proximidades de córregos, rios e também nascentes, por falta de fiscalização essas leis não são
                respeitadas, causando que essas nascentes, córregos e até mesmo rios venham a secar, prejudicando todo
                seu eco-sistema ao redor, com o sistema de controle de nascentes podemos ajudar a identificar as
                nascentes e manter um constante e atualizado cadastro sobre as situações dos ao redores das mesmas.</p>
            <img class="img-responsive" src="<?= base_url('assets/imgs/APP.jpg') ?>"
                 alt="Mapa do google maps com exemplo"/>

        </div>
    </div>
    <hr>
    <footer>
    </footer>
</div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>
