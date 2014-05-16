<?php require_once 'head.php';
  $alumne = $_REQUEST['a']; 
  include_once 'classes/connexio.php';
  include_once 'classes/usuari.php';
  $bd = new connexio();
  $consulta = $bd->query("SELECT * FROM Alumnes WHERE ID=$alumne");
  $resultat = $consulta->fetch_array(MYSQLI_ASSOC);
  $posicio = $resultat['Carrer'].' '.$resultat['Codi_Postal'].' '.$resultat['Poblacio'];
  if ($resultat['Alta_Baixa']==1) {
      $check=TRUE;
  } else {
      $check=FALSE;
  }
?>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
<script>
$(document).ready(function() {
     $('input[name="nom"]').val("<?php echo utf8_encode($resultat['Nom']); ?>");
     $('input[name="cognom1"]').val("<?php echo utf8_encode($resultat['Cognom1']); ?>");
     $('input[name="cognom2"]').val("<?php echo utf8_encode($resultat['Cognom2']); ?>");
     $('input[name="data"]').val("<?php echo utf8_encode($resultat['Data_Naixement']); ?>");
     $('input[name="data2"]').val("<?php echo utf8_encode($resultat['Data_Naixement']); ?>");
     $('input[name="telefon1"]').val("<?php echo utf8_encode($resultat['Telefon1']); ?>");
     $('input[name="telefon2"]').val("<?php echo utf8_encode($resultat['Telefon2']); ?>");
     $('input[name="dni"]').val("<?php echo utf8_encode($resultat['DNI']); ?>");
     $('input[name="direccio"]').val("<?php echo utf8_encode($resultat['Carrer']); ?>");
     $('input[name="cp"]').val("<?php echo utf8_encode($resultat['Codi_Postal']); ?>");
     $('input[name="poblacio"]').val("<?php echo utf8_encode($resultat['Poblacio']); ?>");
     $('input[name="ae"]').val("<?php echo utf8_encode($resultat['Correu_Electronic']); ?>");
     $('input[name="contacte"]').val("<?php echo utf8_encode($resultat['Persona_Contacte']); ?>");
     $('input[name="ccc"]').val("<?php echo utf8_encode($resultat['Compte_Corrent']); ?>");
     $('input[name="alta"]').attr('checked', <?php echo $check; ?>);
   });
   <?php if ($resultat['Foto']!=""){
     $imatge = "fotos/".$resultat['Foto'];
   }else {
     $imatge = "recursos/default.jpg";
   }?>
</script> 
</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="">
    <h3>Modificació d'alumne/a </h3>
    <center>
      <div class="col-md-9">
      <form class="form" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-4">
          <label class="sr-only" for="nom">Nom</label>
          <input type="text" class="form-control" name="nom" placeholder="Nom" required="required">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="cognom1">Primer Cognom</label>
          <input type="text" class="form-control" name="cognom1" placeholder="Primer Cognom" required="required">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="cognom2">Segon Cognom</label>
          <input type="text" class="form-control" name="cognom2" placeholder="Segon Cognom" required="required">
        </div>
        
        <div class="form-group col-md-4">
          <div class="input-group date calendari" data-date-format="dd MM yyyy" data-link-field="data">
            <input class="form-control" type="text" value="" placeholder="Data de naixement" name="data2">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          <input type="hidden" id="data" value="" name="data"/>
        </div>
          <!-- script de configuració del calendari emergent -->
          <script type="text/javascript">
            $('.calendari').datetimepicker({
              language: 'ca',
              weekStart: 1,
              todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 2,
              forceParse: 0
            });
          </script>
        <div class="form-group col-md-4">
          <label class="sr-only" for="telefon1">Telèfon 1</label>
          <input type="text" class="form-control" name="telefon1" placeholder="Telèfon 1" maxlength="9" required="required">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="telefon2">Telèfon 2</label>
          <input type="text" class="form-control" name="telefon2" placeholder="Telèfon 2" maxlength="9">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="dni">DNI</label>
          <input type="text" class="form-control" name="dni" placeholder="DNI/NIE" maxlength="9" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="direccio">Adreça</label>
          <input type="text" class="form-control" name="direccio" placeholder="Adreça" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="cp">Codi Postal</label>
          <input type="text" class="form-control" name="cp" placeholder="Codi Postal" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="poblacio">Població</label>
          <input type="text" class="form-control" name="poblacio" placeholder="Població" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="ae">Correu Electrònic</label>
          <input type="text" class="form-control" name="ae" placeholder="Correu Electrònic">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="foto">Foto</label>
          <input type="file" class="form-control" name="foto" placeholder="Foto de l'alumne">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="contacte">Persona de contacte</label>
          <input type="text" class="form-control" name="contacte" placeholder="Persona de contacte" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="ccc">Compte corrent</label>
          <input type="text" class="form-control" name="ccc" placeholder="Compte corrent" required>
        </div>
        <div class="checkbox-inline col-md-4">
          <label>
            <input type="checkbox" name="alta">Donat d'alta
          </label>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success" onclick = "this.form.action ='actualitzaralumne.php'">Modificar Alumne</button>
          <a href="indexadministratiu?pe=1"><button type="submit" class="btn btn-danger">Tornar sense desar</button></a>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12"></div>
      </form>
      </div>
      <div class="col-md-3">
        <div>
          <img class="img-circle" src="<?php echo $imatge; ?>">
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12"></div>
        <div id="mapa" style="width: 300px; height: 300px;"></div>
      </div>
    </center>
    
  </div>
    <script>
        var geocoder;
        var map;
        function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(40.705, 0.58);
          var mapOptions = {
            zoom: 16,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
          var address = "<?php echo $posicio; ?>";
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location
              });
            } else {
              alert('El mapa no es mostrarà correctament, la direcció és incorrecta');
            }
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</body>
</html>
<?php $bd->close();