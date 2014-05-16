<?php require_once 'head.php';
if ($_SESSION['tipus']!=1) {
  switch ($_SESSION['tipus']) {
      case 2:
          header('Location: indexprofessor.php');
          break;
      case 3:
          header('Location: indexadministratiu.php');
          break;
    }
}
?>

<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
<script type="text/javascript">
  $(function() {
    $(".multiselect").multiselect();
  });

  function paginar(numpagina) {
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp.onreadystatechange=function()
    {
       if (xmlhttp.readyState===4 && xmlhttp.status===200)
          {
             document.getElementById("taulapaginada").innerHTML = xmlhttp.responseText;
          }
    };

    xmlhttp.open("GET","paginatmodificausuari.php?npag="+numpagina,true);
    xmlhttp.send();
  }
  function filtrar() {
    var criteri = document.getElementById("inputmodifica").value;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp2=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp2.onreadystatechange=function()
    {
       if (xmlhttp2.readyState===4 && xmlhttp2.status===200)
          {
             document.getElementById("taulapaginada").innerHTML = xmlhttp2.responseText;
          }
    };

    xmlhttp2.open("GET","filtratusuari.php?c="+criteri,true);
    xmlhttp2.send();
  }

  function filtrarAula() {
    var criteri = document.getElementById("inputmodificaAula").value;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp3=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp2.onreadystatechange=function()
    {
       if (xmlhttp3.readyState===4 && xmlhttp3.status===200)
          {
             document.getElementById("taulapaginadAula").innerHTML = xmlhttp3.responseText;
          }
    };

    xmlhttp3.open("GET","filtrataula.php?c="+criteri,true);
    xmlhttp3.send();
  }

</script>
<style>
  .multiselect {
    width:20em;
    height:15em;
    border:solid 1px #c0c0c0;
    overflow:auto;
    padding: 10px 10px 10px 10px;
    border-radius: 5px;
  }

  .multiselect label {
      display:block;
  }

  .multiselect-on {
      color:#ffffff;
      background-color:#0FD8B0;
  }
</style>
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
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Aula
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
                <h3>Modificació d'usuaris</h3>
              </center>
              <form class="form" role="form">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" onkeyup="filtrar()" id="inputmodifica" placeholder="Usuari a buscar">
                </div>
              </form>
              <div class="col-md-12" id="taulapaginada">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Primer Cognom</th>
                    <th>Segon Cognom</th>
                    <th>DNI/NIE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include_once 'classes/connexio.php';
                    $bd = new connexio();
                    $consulta = $bd->query("SELECT ID FROM Usuaris");
                    $totalfiles = $consulta->num_rows;
                    $perpagina = 5;
                    $totalpagines = $totalfiles / $perpagina;
                    if (($totalfiles % $perpagina)>0) {
                      $totalpagines++;
                    }
                    $consulta2 = $bd->query("SELECT ID,Nom,Cognom1,Cognom2,DNI,Alta_Baixa FROM Usuaris ORDER BY Cognom1,Cognom2,Nom LIMIT $perpagina");
                    $i=1;
                    while ($usuari = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
                  <tr <?php if ($usuari['Alta_Baixa'] == 0) { echo 'class="warning"'; } ?>>
                    <td><?php echo utf8_encode($usuari['Nom']); ?></td>
                    <td><?php echo utf8_encode($usuari['Cognom1']); ?></td>
                    <td><?php echo utf8_encode($usuari['Cognom2']); ?></td>
                    <td><?php echo utf8_encode($usuari['DNI']); ?></td>
                    <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificausuari.php?a=<?php echo $usuari['ID'] ?>'">Modificar</button></td>
                  </tr>
                    <?php $i++; } $bd->close(); ?>
                </tbody>
              </table>
              <center>
                <ul class="pagination pagination-sm">
                  <?php for ($i=1;$i<=$totalpagines;$i++) { ?>
                  <li><a href="#" onclick="paginar(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                  <?php } ?>
                </ul>
              </center>
              </div>
            </div>
            <!--Afegir Aules -->
            <div class="bhoechie-tab-content">
                <center>
                  <h3>Crear aula</h3>
                  <form class="form" role="form" method="post" action="insertaula.php" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="nom_aula">Nom Aula</label>
                      <input type="text" class="form-control" name="nom_aula" placeholder="Nom aula" required="required">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="capacitat">Capacitat</label>
                      <input type="text" class="form-control" name="capacitat" placeholder="Capacitat" required="required">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="planta">Planta</label>
                      <input type="text" class="form-control" name="planta" placeholder="Planta" required="required">
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-info">Crear Aula</button>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12"></div>
                  </form>
                </center>
            </div >
            <!--Modificar Aules -->
            <div class="bhoechie-tab-content">
              <center>
                <h3>Modificar aules</h3>
                <form class="form" role="form">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" onkeyup="filtrarAula()" id="inputmodificaAula" placeholder="Aula a buscar">
                </div>
              </form>
              <div class="col-md-12" id="taulapaginadAula">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Nom d'aula</th>
                    <th>Capacitat</th>
                    <th>Planta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include_once 'classes/connexio.php';
                    $bd = new connexio();
                    $consulta = $bd->query("SELECT ID FROM Aules");
                    $totalfiles = $consulta->num_rows;
                    $perpagina = 5;
                    $totalpagines = $totalfiles / $perpagina;
                    if (($totalfiles % $perpagina)>0) {
                      $totalpagines++;
                    }
                    $consulta2 = $bd->query("SELECT ID,Nom_Aula,Capacitat,Planta FROM Aules ORDER BY Planta,Capacitat LIMIT $perpagina");
                    $i=1;
                    while ($aula = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
                      <tr <?php if($aula['Capacitat'] == 0) { echo 'class="warning"'; } ?>>
                        <td><?php echo utf8_encode($aula['Nom_Aula']); ?></td>
                        <td><?php echo utf8_encode($aula['Capacitat']); ?></td>
                        <td><?php echo utf8_encode($aula['Planta']); ?></td>
                        <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaaula.php?a=<?php echo $aula['ID'] ?>'">Modificar</button></td>
                      </tr>
                    <?php $i++; } $bd->close(); ?>
                </tbody>
              </table>
              <center>
                <ul class="pagination pagination-sm">
                  <?php for ($i=1;$i<=$totalpagines;$i++) { ?>
                  <li><a href="#" onclick="paginar(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                  <?php } ?>
                </ul>
              </center>
              </center>
            </div>
          </div>
      </div>
    </div>
  </div>
</body>
</html>
