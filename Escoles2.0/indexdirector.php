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
  //funcio paginar usuaris
  function paginarUsuari(numpagina) {
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
             document.getElementById("taulapaginadaUsuari").innerHTML = xmlhttp.responseText;
          }
    };

    xmlhttp.open("GET","paginatmodificausuari.php?npag="+numpagina,true);
    xmlhttp.send();
  }
  //Funcio filtrar usuari
  function filtrarUsuari() {
    var criteri = document.getElementById("inputmodificaUsuari").value;
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
             document.getElementById("taulapaginadaUsuari").innerHTML = xmlhttp2.responseText;
          }
    };

    xmlhttp2.open("GET","filtratusuari.php?c="+criteri,true);
    xmlhttp2.send();
  }
// Funció filtrar Aula
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

    xmlhttp3.onreadystatechange=function()
    {
       if (xmlhttp3.readyState===4 && xmlhttp3.status===200)
          {
             document.getElementById("taulapaginadAula").innerHTML = xmlhttp3.responseText;
          }
    };

    xmlhttp3.open("GET","filtrataula.php?c="+criteri,true);
    xmlhttp3.send();
  }

//Funció paginar alumne
  function paginaralumnes(numpagina) {
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp4=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp4.onreadystatechange=function()
    {
       if (xmlhttp4.readyState===4 && xmlhttp4.status===200)
          {
             document.getElementById("taulapaginadaalumnes").innerHTML = xmlhttp4.responseText;
          }
    };

    xmlhttp4.open("GET","paginatmodificaalumne.php?npag="+numpagina,true);
    xmlhttp4.send();
  }

  //funcio filtrar alumnes
  function filtrarAlumnes() {
    var criteri = document.getElementById("inputmodificaalumnes").value;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp5=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp5=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp5.onreadystatechange=function()
    {
       if (xmlhttp5.readyState===4 && xmlhttp5.status===200)
          {
             document.getElementById("taulapaginadaalumnes").innerHTML = xmlhttp5.responseText;
          }
    };

    xmlhttp5.open("GET","filtratalumne.php?c="+criteri,true);
    xmlhttp5.send();
  }

  jQuery.fn.multiselect = function() {
    $(this).each(function() {
        var checkboxes = $(this).find("input:checkbox");
        checkboxes.each(function() {
            var checkbox = $(this);
            // Highlight pre-selected checkboxes
            if (checkbox.prop("checked"))
                checkbox.parent().addClass("multiselect-on");

            // Highlight checkboxes that the user selects
            checkbox.click(function() {
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");
                else
                    checkbox.parent().removeClass("multiselect-on");
            });
        });
    });
  };

  //funcio paginar assignatures
  function paginarAssignatures(numpagina) {
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp6=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp6=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp6.onreadystatechange=function()
    {
       if (xmlhttp6.readyState===4 && xmlhttp6.status===200)
          {
             document.getElementById("taulapaginadaassignatures").innerHTML = xmlhttp6.responseText;
          }
    };

    xmlhttp6.open("GET","paginatmodificaassignatures.php?npag="+numpagina,true);
    xmlhttp6.send();
  }

  //Funcio filtrar assignatures
  function filtrarAssignatura() {
    var criteri = document.getElementById("inputmodificaAssignatura").value;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp7=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp7=new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp7.onreadystatechange=function()
    {
       if (xmlhttp7.readyState===4 && xmlhttp7.status===200)
          {
             document.getElementById("taulapaginadaassignatures").innerHTML = xmlhttp7.responseText;
          }
    };

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
              <!-- Index administratiu-->
              <a href="#" class="list-group-item text-center" id="bcrear">
                <h4 class="glyphicon glyphicon-user"></h4><br/>Crear Alumnes
              </a>
              <a href="#" class="list-group-item text-center" id="bmodificar">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Alumnes
              </a>
              <a href="#" class="list-group-item text-center" id="bmatricular">
                <h4 class="glyphicon glyphicon-list"></h4><br/>Matricular
              </a>
              <a href="#" class="list-group-item text-center" id="bmatricular">
                <h4 class="glyphicon glyphicon-list"></h4><br/>Crear assignatura
              </a>
              <a href="#" class="list-group-item text-center" id="bmatricular">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar assignatura
              </a>
              <a href="#" class="list-group-item text-center" id="bcomptabilitat">
                <h4 class="glyphicon glyphicon-euro"></h4><br/>Comptabilitat
              </a>
            </div>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
            <!-- Crear usuari -->
            <div class="bhoechie-tab-content">
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
                  <input type="text" class="form-control" onkeyup="filtrarUsuari()" id="inputmodificaUsuari" placeholder="Usuari a buscar">
                </div>
              </form>
              <div class="col-md-12" id="taulapaginadaUsuari">
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

<div class="bhoechie-tab-content" id="crear">
              <center>
                <!-- alerta de si s'ha creat un alumne -->
                <?php
                if (isset($_SESSION['nouusuari'])) { ?>
                <div class="alert alert-warning alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Alumne/a creat correctament!</strong>
                </div>
                <?php unset($_SESSION['nouusuari']) ;} ?>
                <h3>Nou alumne/a</h3>
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
                  <button type="submit" class="btn btn-success">Crear Alumne</button>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-12"></div>
                </form>
              </center>
              </div>
              <!-- Modificar alumnes -->
              <div class="bhoechie-tab-content" id="modificar">
                <center>
                  <h3>Modificació d'alumnes</h3>
                </center>
                <form class="form" role="form">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" onkeyup="filtrarAlumnes()" id="inputmodificaalumnes" placeholder="Alumne a buscar">
                  </div>
                </form>
                <div class="col-md-12" id="taulapaginadaalumnes">
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
                      $consulta = $bd->query("SELECT ID FROM Alumnes");
                      $totalfiles = $consulta->num_rows;
                      $perpagina = 5;
                      $totalpagines = $totalfiles / $perpagina;
                      if (($totalfiles % $perpagina)>0) {
                        $totalpagines++;
                      }
                      $consulta2 = $bd->query("SELECT ID,Nom,Cognom1,Cognom2,DNI,Alta_Baixa FROM Alumnes ORDER BY Cognom1,Cognom2,Nom LIMIT $perpagina");
                      $i=1;
                      while ($alumne = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
                    <tr <?php if ($alumne['Alta_Baixa'] == 0) { echo 'class="warning"'; } ?>>
                      <td><?php echo utf8_encode($alumne['Nom']); ?></td>
                      <td><?php echo utf8_encode($alumne['Cognom1']); ?></td>
                      <td><?php echo utf8_encode($alumne['Cognom2']); ?></td>
                      <td><?php echo utf8_encode($alumne['DNI']); ?></td>
                      <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaalum.php?a=<?php echo $alumne['ID'] ?>'">Modificar</button></td>
                      <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='alumpdf.php?a=<?php echo $alumne['ID'] ?>'">Generar Fitxa</button></td>
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

              <!-- Matricular -->
              <div class="bhoechie-tab-content" id="matricular">
                <center>
                  <h3>Matriculació d'alumnes</h3>
                </center>
                <form class="form" role="form" method="post" action="matricular.php">
                <?php
                  include_once 'classes/connexio.php';
                  $bd = new connexio();
                  $llista_alumnes = $bd->query("SELECT ID,Nom,Cognom1,Cognom2 FROM Alumnes WHERE Alta_Baixa=1 ORDER BY Cognom1,Cognom2,Nom"); ?>
                  <div class="multiselect form-group col-md-4">
                    <?php while ($fila = $llista_alumnes->fetch_array(MYSQLI_ASSOC)) { ?>
                    <label><input type="checkbox" name="alumnematricula[]" value="<?php echo $fila['ID']; ?>" /><?php echo utf8_encode($fila['Nom']." ".$fila['Cognom1']." ".$fila['Cognom2']); ?></label>
                    <?php } $bd->close(); ?>
                  </div>
                <?php
                  include_once 'classes/connexio.php';
                  $bd = new connexio();
                  $llista_assignatures = $bd->query("SELECT ID,Assignatura FROM Assignatures ORDER BY Assignatura"); ?>
                  <div class="multiselect form-group col-md-offset-1 col-md-4">
                    <?php while ($fila = $llista_assignatures->fetch_array(MYSQLI_ASSOC)) { ?>
                    <label><input type="checkbox" name="assignaturamatricula[]" value="<?php echo $fila['ID']; ?>" /><?php echo utf8_encode($fila['Assignatura']); ?></label>
                    <?php } $bd->close(); ?>
                  </div>
                <?php
                  include_once 'classes/connexio.php';
                  $bd = new connexio();
                  $llista_cursos = $bd->query("SELECT ID,Curs FROM Cursos ORDER BY Curs DESC"); ?>
                  <div class="form-group col-md-offset-1 col-md-3">
                    <select class="form-control" name="curs">
                      <?php while ($fila = $llista_cursos->fetch_array(MYSQLI_ASSOC)) { ?>
                      <option value="<?php echo $fila['ID']; ?>"><?php echo utf8_encode($fila['Curs']); ?></option>
                      <?php } $bd->close(); ?>
                    </select>
                  </div>
                  <center>
                  <div class="clearfix"></div>
                  <button type="submit" class="btn btn-success">Matricular</button>
                  </center>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-12"></div>
                </form>
              </div>

              <!--Crear assignatures -->
              <div class="bhoechie-tab-content" id="crearassignatures">
                <center>
                  <form class="form" role="form" method="post" action="insertassignatura.php" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="assignatura">Assignatura</label>
                      <input type="text" class="form-control" name="assignatura" placeholder="Assignatura">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="professor">Professor</label>
                      <select class="form-control" id="professor" name="professor">
                        <?php require_once 'classes/connexio.php';
                        require_once 'classes/usuari.php';
                        $bd = new connexio;
                        $profes = $bd->query("SELECT ID FROM Usuaris WHERE Tipus = 2");
                        $nom = new usuari;
                        while ($prof = $profes->fetch_array(MYSQLI_ASSOC)){ ?>
                          <option value="<?=$prof['ID'] ?>"><?=$nom->mostrarUsuari($prof['ID'])?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="horari">Horari dia/hora</label>
                      <input type="text" class="form-control" name="horari" placeholder="Horari dia/hora">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="sr-only" for="preu">Preu</label>
                      <input type="text" class="form-control" name="preu" placeholder="Preu">
                    </div>
                    <center>
                      <div class="clearfix"></div>
                      <button type="submit" class="btn btn-success">Crear assignatura</button>
                    </center>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12"></div>
                  </form>
                </center>
              </div>
              <!--Modificar assignatura -->
              <div class="bhoechie-tab-content" id="modificaAssignatures">
                <center>
                  <h3>Modificar assignatures</h3>
                  <form class="form" role="form">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" onkeyup="filtrarAssignatura()" id="inputmodificaAssignatura" placeholder="Assignatura a buscar">
                    </div>
                  </form>
                    <div id="taulapaginadAula">
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Assignatura</th>
                        <th>Professor</th>
                        <th>Horari dia/hora</th>
                        <th>Preu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include_once 'classes/connexio.php';
                        $bd = new connexio();
                        $consulta = $bd->query("SELECT ID FROM Assignatures");
                        $totalfiles = $consulta->num_rows;
                        $perpagina = 5;
                        $totalpagines = $totalfiles / $perpagina;
                        if (($totalfiles % $perpagina)>0) {
                          $totalpagines++;
                        }
                        $consulta2 = $bd->query("SELECT ID,Assignatura,Professor,Horari,Preu FROM Assignatures ORDER BY Assignatura LIMIT $perpagina");
                        $i=1;
                        while ($assignatura = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
                      <tr <?php if ($assignatura['Preu'] == 0) { echo 'class="warning"'; } ?>>
                        <td><?php echo utf8_encode($assignatura['Assignatura']); ?></td>
                        <td><?php echo utf8_encode($assignatura['Professor']); ?></td>
                        <td><?php echo utf8_encode($assignatura['Horari']); ?></td>
                        <td><?php echo utf8_encode($assignatura['Preu']); ?></td>
                        <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaassignatura.php?a=<?php echo $assignatura['ID'] ?>'">Modificar</button></td>
                      </tr>
                        <?php $i++; } $bd->close(); ?>
                    </tbody>
                    </table>
                    </div>
                    <center>
                      <ul class="pagination pagination-sm">
                        <?php for ($i=1;$i<=$totalpagines;$i++) { ?>
                          <li><a href="#" onclick="paginar(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
                        <?php } ?>
                      </ul>
                    </center>
                  </center>
              </div>

              <!-- Comptabilitat -->
              <div class="bhoechie-tab-content" id="comptabilitat">
                <div class="col-md-12">
                  <form role="form" class="form" method="post">
                    <div class="form-group col-md-4 ">
                      <select class="form-control" name="mes">
                        <option value="1">Gener</option>
                        <option value="2">Febrer</option>
                        <option value="3">Març</option>
                        <option value="4">Abril</option>
                        <option value="5">Maig</option>
                        <option value="6">Juny</option>
                        <option value="7">Juliol</option>
                        <option value="8">Agost</option>
                        <option value="9">Setembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Desembre</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-success" onclick="if (confirm('Estàs segur de crear aquest remesa?')){this.form.action='remesar.php';}">Remesar</button>
                    <button type="submit" class="btn btn-success" onclick="this.form.action='facturar.php'">Facturar</button>
                  </form>
                  <div class="col-md-12" id="taulapaginada">
                    <table class="table table-hover table-striped">
                        <?php require_once 'classes/usuari.php';
                        $alumne = new usuari(); ?>
                      <thead>
                        <tr>
                          <th>Alumne</th>
                          <th>Concepte</th>
                          <th>Import</th>
                          <th>Data</th>
                          <th>Facturat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          include_once 'classes/connexio.php';
                          $bd = new connexio();
                          $linies = $bd->query("SELECT * FROM Assentaments ORDER BY ID DESC");
                          while ($linia = $linies->fetch_array(MYSQLI_ASSOC)){
                        ?>
                        <tr>
                          <td><?=utf8_encode($alumne->mostrarAlumne($linia['ID_Alumne']))?></td>
                          <td><?=utf8_encode($linia['Concepte'])?></td>
                          <td><?=utf8_encode($linia['Import'])?></td>
                          <td><?=utf8_encode($linia['Data'])?></td>
                          <td><?php if ($linia['Facturat']==0){echo 'NO';}else{echo 'SI';} ?></td>
                        </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <h1 class="text-center" id="titul">Gestió integral de centres privats</h1>
          </div>

          </div>

      </div>
    </div>
  </div>
</body>
</html>
