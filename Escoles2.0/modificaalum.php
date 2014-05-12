<?php require_once 'head.php';
$alumne = $_REQUEST['a'];
?>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="container">
    <h3>Modificació d'alumne/a</h3>
    <center>
      <form class="form" role="form" method="post" action="insertaralum.php" enctype="multipart/form-data">
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
            <input class="form-control" type="text" value="" placeholder="Data de naixement">
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
        <div class="form-group col-md-4 col-md-offset-2">
          <label class="sr-only" for="contacte">Persona de contacte</label>
          <input type="text" class="form-control" name="contacte" placeholder="Persona de contacte" required>
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="ccc">Compte corrent</label>
          <input type="text" class="form-control" name="ccc" placeholder="Compte corrent" required>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-info">Crear Alumne</button>
        <div class="clearfix"></div>
        <div class="form-group col-md-12"></div>
      </form>
    </center>
  </div>       
</body>
</html>