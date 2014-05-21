<?php header("refresh:3;url=indexdirector.php");?>
<?php require_once 'head.php';

/**
 * @author Grup1
 * @version 0.1
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
            <!-- Crear usuari -->  
            <div class="bhoechie-tab-content active">
            	<center>
            		<?php
					require_once("classes/usuari.php");
						$nom         = $_POST['nom'];
						$cognom1     = $_POST['cognom1'];
						$cognom2     = $_POST['cognom2'];
						$data        = $_POST['data'];
						$telefon1    = $_POST['telefon1'];
						$telefon2    = $_POST['telefon2'];
						$dni         = $_POST['dni'];
						$direccio    = $_POST['direccio'];
						$cp          = $_POST['cp'];
						$contrasenya = $_POST['password2'];
						$poblacio    = $_POST['poblacio'];
						$correu      = $_POST['ae'];
						$foto        = $_FILES['foto'];
						$tipus       = $_POST['tipus'];

						$ruta_relativa = 'fotos/';
						$imatge = $_FILES["foto"]["name"];
						$ruta_imatge = $ruta_relativa.$imatge;

						if(move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_imatge)){
							$foto = $ruta_imatge;
							$nou_usuari = new nouAdministratiu($nom,$cognom1,$cognom2,$data,$telefon1,$telefon2,$dni,$direccio,$cp,$contrasenya,$poblacio,$correu,$foto,$tipus);
							if($nou_usuari->insertarUsuari()){ print "<b><h2>L'usuari s'ha creat correctament.</h2></b>";
							
							}else print "L'usuari no s'ha creat.";
						}else print "L'imatge no s'ha pujat."
					?>
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

