<?php require_once 'head.php';?>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="">
    <div class="row">
      <div class="col-md-12 bhoechie-tab-container">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
            <div class="list-group">
              <a href="#" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-user"></h4><br/>Crear Alumnes
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Alumnes
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
            <!-- Crear alumnes -->  
            <div class="bhoechie-tab-content active">
                  <center>
                    <h1>Nou alumne</h1>
                    <form class="form-inline" role="form">
                      <div class="form-group">
                        <label class="sr-only" for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Nom" required="required">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="cognom1">Primer Cognom</label>
                        <input type="text" class="form-control" id="cognom1" placeholder="Primer Cognom" required="required">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="cognom2">Segon Cognom</label>
                        <input type="text" class="form-control" id="cognom2" placeholder="Segon Cognom" required="required">
                      </div>
                      <div class="form-group">
                        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            
        </script>
                      </div>
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </form>

                  </center>
              </div>

              <!-- Modificar alumnes -->
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
