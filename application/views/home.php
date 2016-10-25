<h1>Hello World</h1>

<form class="" action="<?=site_url('Usuario/realizarLogin')?>" method="post">
  Login: <input type="text" name="email" value="">
  <br>
  Senha: <input type="password" name="senha" value="">
  <input type="submit" name="name" value="Realizar Login">
</form>



<form class="" action="<?=site_url('Local/salvarLocal')?>" method="post">
  Nome <input type="text" name="nome" value="">
  <br>
  Descricao <input type="text" name="descricao" value="">
  <br>
  Criador Local <input type="text" name="criador" value="">
  <br>
  latitude <input type="text" name="latitude" value="">
  <br>
  longitude <input type="text" name="longitude" value="">
  <br>
  data_local <input type="date" name="data_local" value="">
  <br>
  <input type="submit" name="name" value="Enviar">
</form>
