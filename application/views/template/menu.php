<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php
                $ativo = array();
                $ativo[0] = "";
                $ativo[1] = "";
                $ativo[2] = "";

                $ativo[$pos] = 'class="active"';
                ?>
                <li <?php echo $ativo[0];?>><a href="<?= site_url('Painel_usuario') ?>">Página inicial</a></li>
                
                <li <?php echo $ativo[2];?>><a href="<?= site_url('Nascente/listarNascentes') ?>">Listar nascentes</a></li>
            </ul>

            <h3>Nova Nascente</h3>
            <form class="" action="<?= site_url('Nascente/cadastrarNascente') ?>" method="post">
              <div class="">
                  <input type="text" class="form-control" name="nome"
                         value="" placeholder="Nome da Nascente" required/>
              </div>
              <br>
              <div class="">
                  <input type="text" id="txtLatitude" class="form-control" name="latitude"
                         value="" placeholder="Latitude" required/>
              </div>
              <br>
              <div class="">
                  <input type="text" id="txtLongitude" class="form-control" name="longitude"
                         value="" placeholder="Longitude" required/>
              </div>
              <br>
              <div class="">
                    <textarea name="descricao" value=""
                              placeholder="Informe a Descrição..."
                              class="form-control" rows="3"></textarea>
              </div>
              <br>
              <div class="form-group">

                  <div class="col-sm-9">
                      <button type="submit" class="btn btn-primary">
                          CADASTRAR <span class="glyphicon glyphicon-ok"></span>
                      </button>
                  </div>
              </div>
            </form>
        </div>
