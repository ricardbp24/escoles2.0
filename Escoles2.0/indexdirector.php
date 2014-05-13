<?php require_once 'head.php';

/** 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="">
    <div class="row">
      <div class="col-md-12 bhoechie-tab-container">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
            <div class="list-group">
              <a href="#" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-user"></h4><br/>Crear Usuari
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Usuari
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-list"></h4><br/>Matricular
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-euro"></h4><br/>Comptabilitat
              </a>
            </div>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
            <!-- Crear usuari -->  
            <div class="bhoechie-tab-content active">
              <center>
                <!-- alerta de si s'ha creat un alumne -->
                <?php
                if (isset($_SESSION['nouusuari'])) { ?>
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Alumne creat correctament!</strong>
                </div>
                <?php unset($_SESSION['nouusuari']) ;} ?> 
                <h3>Nou usuari</h3>
                <form class="form" role="form" method="post" action="insertusuari.php" enctype="multipart/form-data">
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
                  <script>
                  	function comparaPass(){
                  		var pass1 = document.getElementById("pass1").value;
                  		var pass2 = document.getElementById("pass2").value;
                  		if(pass1!=pass2) document.getElementById("pass22").className = "form-group col-md-4 has-error";
						          else document.getElementById("pass22").className = "form-group col-md-4 has-success";
                  	}
                  </script>
                  <div class="form-group col-md-4">
                  	<label for="password" class="sr-only">Contrasenya</label>
                  	<input id="pass1" type="password" class="form-control" name="password1" placeholder="Contrasenya" required>
                  </div>
                  <div class="form-group col-md-4" id="pass22">
                  	<label for="password" class="sr-only">Contrasenya</label>
                  	<input id="pass2" type="password" class="form-control" name="password2" placeholder="Repeteix la contrasenya" required onkeyup="comparaPass();">
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
                  	<label for="tipus" class="sr-only">Tipus usuari</label>
                  	<select name="tipus" class="form-control">
                  		<?php
                  			require_once("classes/tipususuari.php");
                  			$tipus = new tipususuari();
                  			$tipus->llistarTipus();
                  		?>
                  	</select>
                  </div>
                  
                  <div class="clearfix"></div>
                  <button type="submit" class="btn btn-info">Crear Usuari</button>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-12"></div>
                </form>
              </center>
              </div>

              <!-- Modificar Usuari -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

              <!-- Matricular -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

              <!-- Comptabilitat -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

          </div>
      </div>
    </div>
  </div>       
</body>
</html>
