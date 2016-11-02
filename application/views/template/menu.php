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
                <li <?php echo $ativo[1];?>><a href="<?= site_url('Nascente/carregaCadastrarNascente') ?>">Cadastrar nova nascente</a></li>
                <li <?php echo $ativo[2];?>><a href="<?= site_url('Nascente/listarNascentes') ?>">Listar nascentes</a></li>
            </ul>
        </div>