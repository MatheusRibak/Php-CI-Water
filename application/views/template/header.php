<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Nascentes">
    <meta name="author" content="Julio Cesar Albino">
    <link rel="icon" href="../../favicon.ico">
    <title>Sistema de Nascentes</title>
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/jquery/jquery-1.10.2.js')?>"></script>
    <script languague="javascript">
      function abrir(largura, altura){ window.open('<?=site_url('Nascente/verImagem') ?>','popup','width='+largura+',height='+altura+',scrolling=auto,top=0,left=0') }
    </script>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistema de Nascentes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=site_url('Painel_Usuario/deslogar')?>">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
