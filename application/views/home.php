<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=ColoqueASuaKeyAqui&amp;sensor=false"></script>
  </head>
  <body>
    <form method="post" action="" id="">
    <fieldset>
        <legend>Google Maps</legend>

        <div>
            <label for="txtEndereco">Endereço:</label>
            <input type="text" id="txtEndereco" name="txtEndereco" />
        </div>
        <div>
            <input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
        </div>
 
        <div id="mapa" style="height: 500px; width: 500px">
        </div>

        <div>
            <input type="submit" value="Enviar" name="btnEnviar" />
        </div>

        <input type="hidden" id="txtLatitude" name="txtLatitude" />
        <input type="hidden" id="txtLongitude" name="txtLongitude" />
    </fieldset>
</form>

  </body>
</html>
