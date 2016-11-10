<script src="<?= base_url('assets/js/teste.js') ?>"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-sm-12">
        <?php echo validation_errors(); ?>
        <?php if ($this->input->get('aviso') == 1) { ?>
            <div class="alert alert-success">
                Você editou a nascente com sucesso!!!
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control" id="system-search" name="q"
                       placeholder="Pesquisar nascentes" required> <span
                        class="input-group-btn">
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <form>
            <table class="table-responsive table-list-search table-hover table-condensed">
                <thead>
                <tr>
                    <th>Nome Nascente</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>
                        Descrição
                    </th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php foreach ($minhasNascentes as $key): ?>
                    <tr>
                        <td><?php echo $key->nome_nascente; ?></td>
                        <td><?php echo $key->latitude; ?></td>
                        <td><?php echo $key->longitude; ?></td>
                        <td><?php echo $key->descricao_nascente; ?></td>
                        <td>
                            <a href="#"><?php echo $key->longitude; ?></a>
                        </td>
                        <td>
                            <a href="<?= site_url('Nascente/carregaEditarNascente/' . $key->cd_local) ?>"
                               class="btn btn-primary btn-sm" title="Editar Nascente">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar Nascente </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
