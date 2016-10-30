<script src="<?=base_url('assets/js/teste.js')?>"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-3">
            <div class="input-group">
                <input class="form-control" id="system-search" name="q"
                       placeholder="Pesquisar exame" required> <span
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
                    <th>Data:</th>
                    <th>Resultado:</th>
                    <th>Alimentação:</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody id="myTable">
<!--                //Faz o FOR-->
                    <tr>
                        <td>Teste</td>
                        <td>Resultado</td>
                        <td>Teste123</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#myModal${exame.cd_exame}"> +
                            </button>
                        </td>
                    </tr>
<!--                Termina o FOR-->
                </tbody>
            </table>
        </form>
    </div>
</div>
