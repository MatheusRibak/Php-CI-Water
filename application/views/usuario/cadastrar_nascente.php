
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Dashboard Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="<?=base_url('assets/css/dashboard.css')?>" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Project name</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Dashboard</a></li>

        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li><a href="<?=site_url('Painel_usuario')?>">Home</a></li>
          <li class="active"><a href="<?=site_url('Nascente/carregaCadastrarNascente')?>">Cadastrar Nova Nascente</a></li>
        </ul>


      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Cadastrar Nova Nascente</h1>

        <div class="col-sm-12">
             <?php echo validation_errors(); ?>
             <?php if ($this->input->get('aviso') == 1) { ?>
               <div class="alert alert-success">
                 Você cadastrou a Nascente Com sucesso!!!
               </div>
               <?php } ?>
             </div>



        <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Informe os dados...
                </div>
                <div class="panel-body">
                  <form class="form-horizontal"
                  action="<?=site_url('Nascente/cadastrarNascente')?>" method="post">
                  <div class="form-group">
                    <label class="col-sm-2">Nome
                       </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nome"
                        value="" placeholder="Nome da Vaga" required/>
                      </div>
                    </div>





                    <div class="form-group">
                      <label class="col-sm-2">Latitude
                      </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="latitude"
                        value="" placeholder="Informe a Latitude" required/>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Longitude
                      </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="longitude"
                        value="" placeholder="Informe a Longitude" required/>
                      </div>

                    </div>




                        <div class="form-group">
                          <label class="col-sm-2">Descrição da
                            <br>
                            Nascente </label>
                            <div class="col-sm-9">
                              <textarea name="descricao" value=""
                              placeholder="Informe a Descrição..."
                              class="form-control" rows="3"></textarea>


                            </div>
                          </div>



                          <div class="form-group">

                            <label class="col-sm-2"></label>
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-primary">
                                CADASTRAR <span class="glyphicon glyphicon-ok"></span>
                              </button>
                            </div>

                          </div>

                        </form>
                      </div>

                    </div>
                  </div>





      </div>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
      <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
      <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
    </html>
