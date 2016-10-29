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
                      action="<?= site_url('Nascente/cadastrarNascente') ?>" method="post">
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