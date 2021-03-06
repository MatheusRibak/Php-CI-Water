<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Editar Nascente</h1>
  <div class="col-sm-12">
      <?php echo validation_errors(); ?>

  </div>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Por favor edite os dados que ache necessario...
      </div>
      <div class="panel-body">

        <?php foreach ($nascente as $key): ?>

<?=form_open_multipart('Nascente/salvarEdicao'); ?>

          <div class="">
            <label class="col-sm-2 espaco-campos">Nome
            </label>
            <div class="col-sm-9 espaco-campos">
              <input type="text" class="form-control " name="nome"
              value="<?php echo $key->nome_nascente; ?>" placeholder="Nome da Vaga" required/>
            </div>
          </div>



          <div class="espaco-campos">
            <label class="col-sm-2 espaco-campos">Latitude
            </label>
            <div class="col-sm-9 espaco-campos">
              <input type="text" class="form-control" name="latitude"
              value="<?php echo $key->latitude; ?>" placeholder="Informe a Latitude" required/>
            </div>
          </div>

    <div class=" espaco-campos">
            <label class="col-sm-2 espaco-campos">Longitude
            </label>
            <div class="col-sm-9 espaco-campos">
              <input type="text" class="form-control" name="longitude"
              value="<?php echo $key->longitude; ?>" placeholder="Informe a Longitude" required/>
            </div>
          </div>

          <div class="form-group espaco-campos">
            <label class="col-sm-2 espaco-campos">Descrição da

              Nascente </label>
              <div class="col-sm-9 espaco-campos">
                <textarea name="descricao" value=""
                placeholder="Informe a Descrição..."
                class="form-control" rows="3"><?php echo $key->descricao_nascente; ?></textarea>
              </div>
            </div>

            <input type="hidden" name="cd_local" value="<?php echo $key->cd_local; ?>">
            <div class="form-group">
              <label class="col-sm-2"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">
                  SALVAR EDIÇÃO <span class="glyphicon glyphicon-ok"></span>
                </button>
              </div>
            </div>
          <?php endforeach; ?>
        </form>
      </div>
    </div>
  </div>
</div>
