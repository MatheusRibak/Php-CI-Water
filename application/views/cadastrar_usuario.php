
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

    <title>Jumbotron Template for Bootstrap</title>

    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/jumbotron.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/fundo_cinza.css')?>" rel="stylesheet">
	<script src="<?=base_url('assets/js/jquery.mask.min.js')?>" type="text/javascript"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
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
          <form class="navbar-form navbar-right" action="<?=site_url('Usuario/realizarLogin')?>" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="senha">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<br>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="content container-fluid  card col-sm-8 col-sm-offset-2">
  		<div class="row content">
  			<div>
  				<div class="col-sm-8 col-sm-offset-2">
  					<h2>Cadastro de Novo Usuário</h2>
            <?php echo validation_errors(); ?>
            					<?php if ($this->input->get('aviso') == 1) { ?>
            						<div class="alert alert-success">
            							Cadastrado realizado com sucesso!
            						</div>
            						<?php } ?>
            						<?php if ($this->input->get('aviso') == 2) { ?>
            							<div class="alert alert-danger">
            								E-mail já cadastrado! Tente inserir outro e-mail, ou se lembrar se já não se cadastrou no sistema!
            							</div>
            							<?php } ?>

  							<div class="tab-content">
  								<div id="ong" class="tab-pane fade in active">
  								</br>
  								<form action="<?=site_url('Usuario/cadastrarUsuario')?>" method="post">
                    <div class="form-group">
  										<label for="e">Nome Completo: *</label>
  										<input type="text"
  										id="senha" name="nome"
  										value="" class="form-control" required  />
  									</div>

  									<div class="form-group">
  										<label for="">E-mail: *</label>
  										<input type="email"
  										name="email" id=""
  										value="" class="form-control" required  />
  									</div>

  									<div class="form-group">
  										<label for="e">Senha: *</label>
  										<input type="password"
  										id="senha" name="senha"
  										value="" class="form-control" required  />
  									</div>
                    <div class="form-group">
  										<label for="e">Telefone: *</label>
  										<input type="text"
  										id="senha" name="telefone"
  										value="" class="form-control" required  />
  									</div>
                    <div class="form-group">
                      <label for="e">CPF: *</label>
                      <input type="text"
                      id="senha" name="cpf"
                      value="" class="form-control" required  />
                    </div>
                    <div class="form-group">
                      <label for="e">Rua: *</label>
                      <input type="text"
                      id="senha" name="rua"
                      value="" class="form-control" required  />
                    </div>
                    <div class="form-group">
                      <label for="e">Nº: *</label>
                      <input type="text"
                      id="senha" name="numero"
                      value="" class="form-control" required  />
                    </div>
                    <div class="form-group">
                        <label for="e">Estado: *</label>
                      <select name="estado" lang="pt" class="form-control" name = "estado">
                                           <option value="AC">Acre</option>
                                           <option value="AL">Alagoas</option>
                                           <option value="AM">Amazonas</option>
                                           <option value="AP">Amapá</option>
                                           <option value="BA">Bahia</option>
                                           <option value="CE">Ceará</option>
                                           <option value="DF">Distrito Federal</option>
                                           <option value="ES">Espírito Santo</option>
                                           <option value="GO">Goiás</option>
                                           <option value="MA">Maranhão</option>
                                           <option value="MT">Mato Grosso</option>
                                           <option value="MS">Mato Grosso do Sul</option>
                                           <option value="MG">Minas Gerais</option>
                                           <option value="PA">Pará</option>
                                           <option value="PB">Paraíba</option>
                                           <option value="PR">Paraná</option>
                                           <option value="PE">Pernambuco</option>
                                           <option value="PI">Piauí</option>
                                           <option value="RJ">Rio de Janeiro</option>
                                           <option value="RN">Rio Grande do Norte</option>
                                           <option value="RO">Rondônia</option>
                                           <option value="RS">Rio Grande do Sul</option>
                                           <option value="RR">Roraima</option>
                                           <option value="SC">Santa Catarina</option>
                                           <option value="SE">Sergipe</option>
                                           <option value="SP">São Paulo</option>
                                           <option value="TO">Tocantins</option>
                                       </select>
                    </div>
                    <div class="form-group ">
                      <label for="e">Cidade: *</label>
                      <input type="text"
                      id="senha" name="cidade"
                      value="" class="form-control" required  />
                    </div>






  									<button type="submit" class="btn btn-primary">
  										Realizar Cadastro <span class="glyphicon glyphicon-ok"></span>
  									</button>
  									<br>
  									<br>
  								</form>
  							</div>

  					</div>
  				</div>
  			</div>
  		</div>
  	</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>

  </body>
</html>
