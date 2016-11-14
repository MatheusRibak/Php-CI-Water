<script src="<?= base_url('assets/js/teste.js') ?>"></script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="col-md-12">
      <div class="row">
          <div class="col-md-4">
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
      <br>


        <div class="panel panel-default panel-table table-list-search">
           <div class="panel-heading ">
             <div class="row ">
               <div class="col col-xs-6">
                 <h3 class="panel-title">Todas as Nascentes</h3>

               </div>
               <div class="col col-xs-6 text-right">
               </div>
             </div>
           </div>
           <div class="panel-body">
             <div class="table-responsive">


             <table class="table">
             <thead>
                 <tr>
                   <th>Nome Nascente</th>
                     <th>Latitude</th>
                     <th>Longitude</th>
                     <th>Descrição</th>
                     <th>Opções</th>
                 </tr>
             </thead>
             <tbody id="myTable">
             <?php if (!empty($minhasNascentes)):
                foreach ($minhasNascentes as $key): ?>


                   <tr>
                     <td><?php echo $key->nome_nascente; ?></td>
                     <td><?php echo $key->latitude; ?></td>
                     <td><?php echo $key->longitude; ?></td>
                     <td><?php echo $key->descricao_nascente; ?></td>
                     <td>
                         <a href="<?= site_url('Nascente/carregaVerNascente/' . $key->cd_local) ?>"
                            class="btn btn-primary btn-sm" title="Ver Nascente">
                             <i class="fa fa-pencil" aria-hidden="true"></i>
                             Ver Nascente </a>
                     </td>
                   </tr>
                         <?php endforeach; ?>
                       <?php else: {
                         echo "<td colspan='5' align = 'center'>
                       Você não tem nenhuma Doação
                                   </td>";
                       } ?>
                       <?php	endif; ?>
             </tbody>

             </table>
        </div>
           </div>
           <div class="panel-footer ">
             <div class="row">

             </div>
           </div>
         </div>








    </div>
</div>
