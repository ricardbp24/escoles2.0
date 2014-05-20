<?php header("refresh:3;url=indexdirector.php");?>
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
                <h4 class="glyphicon glyphicon-list"></h4><br/>Crear Aula
              </a>
            </div>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
            <!-- Crear Assignatura -->
            <div class="bhoechie-tab-content active">
            	<center>
          		  <?php
      					require_once("classes/assignatura.php");
                  $assignatura = $_POST['assignatura'];
                  $professor = $_POST['professor'];
      						$horari = $_POST['horari'];
                  $preu = $_POST['preu'];
                  $assignatura = new novaAssignatura(utf8_decode($assignatura),$professor,$horari,$preu);
                  if($assignatura->insertaAssignatura()) print "<b><h2>L'assignatura s'ha creat correctament<b><h2>";
                  else print "<b><h2>L'assignatura NO s'ha creat<b><h2>";
      					?>
            	</center>
            </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>

