<!-- menu usa col-sm-3 e col-md-2  eh o menu lateral, o resto fica na proxima div-->
<!-- essa div utiliza a sobra do menu lateral... -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Mapa de Nascentes</h1>
    <div class="col-sm-12">
        <?php echo validation_errors(); ?>
        <?php if ($this->input->get('aviso') == 1) { ?>
            <div class="alert alert-success">
                Você cadastrou a Nascente Com sucesso!!!
            </div>
        <?php } ?>
        <?php if ($this->input->get('aviso') == 2) { ?>
            <div class="alert alert-danger">
                Uma Nascente com esses dados já está cadastrada em nosso site!!!
            </div>
        <?php } ?>
    </div>
    <div class="col-xm-12">
      <div class="panel panel-default">
         <div class="panel-heading">
           Procurar Nascente
         </div>
         <div class="panel-body">
           <form action="<?=site_url('Painel_Usuario/procurarNascestes')?>" method="post">
             <div class="row">



               <div class="col-sm-12">
                 <div class="form-group col-sm-12">
                   <label for="">Por favor digite a cidade que deseja procurar...</label>
                   <br>	<input
                   type="text" class="form-control" name="input_busca"
                   placeholder="Procurar cidade" value=""   />
                 </div>




               </div>

             </div>
             <div class="col-sm-12">
               <button type="submit" class="btn btn-primary">
                 <i class="fa fa-search"></i>		PROCURAR CIDADE
               </button>
             </div>



           </form>
         </div>

       </div>
    </div>
    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">
                Nascentes já cadastradas em nosso site...
            </div>
            <div class="panel-body">
                <?php echo $map['js']; ?>
                <?php echo $map['html']; ?>
            </div>
            <script type="text/javascript">
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function () {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // [START region_getplaces]
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };
                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
                // [END region_getplaces]
            </script>
        </div>
    </div>

    <div id="map"></div>
</div>
