<?php 
/**
 * @author Grup1
 * @version 0.1
 */
require_once 'head.php';
if ($_SESSION['tipus']!=3) {
  switch ($_SESSION['tipus']) {
      case 1:
          header('Location: indexdirector.php');
          break;
      case 2:
          header('Location: indexprofessor.php');
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

    xmlhttp.open("GET","paginatmodificaalumne.php?npag="+numpagina,true);
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

    xmlhttp2.open("GET","filtratalumne.php?c="+criteri,true);
    xmlhttp2.send();
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
<body onload="canviPestanya()">
  <?php require_once 'barranav.php';?>
  <div class="">
    <div class="row">
      <div class="col-md-12 bhoechie-tab-container">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
            <div class="list-group">
              <a href="#" class="list-group-item active text-center" id="bcrear">
                <h4 class="glyphicon glyphicon-user"></h4><br/>Crear Alumnes
              </a>
              <a href="#" class="list-group-item text-center" id="bmodificar">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Alumnes
              </a>
              <a href="#" class="list-group-item text-center" id="bmatricular">
                <h4 class="glyphicon glyphicon-list"></h4><br/>Matricular
              </a>
              <a href="#" class="list-group-item text-center" id="bcomptabilitat">
                <h4 class="glyphicon glyphicon-euro"></h4><br/>Comptabilitat
              </a>
            </div>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
            <!-- Crear alumnes -->  
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
                    <input type="text" class="form-control" onkeyup="filtrar()" id="inputmodifica" placeholder="Alumne a buscar">
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
    <script>
        function canviPestanya() {
            var id = getURLParameter('pe');
            document.getElementById("crear").className = document.getElementById("crear").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("modificar").className = document.getElementById("modificar").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("matricular").className = document.getElementById("matricular").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("comptabilitat").className = document.getElementById("comptabilitat").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("bcrear").className = document.getElementById("bcrear").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("bmodificar").className = document.getElementById("bmodificar").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("bmatricular").className = document.getElementById("bmatricular").className.replace(/(?:^|\s)active(?!\S)/g , '');
            document.getElementById("bcomptabilitat").className = document.getElementById("bcomptabilitat").className.replace(/(?:^|\s)active(?!\S)/g , '');
            if (id == '0') {               
                document.getElementById("crear").className += " active";
                document.getElementById("bcrear").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '1') {               
                document.getElementById("modificar").className += " active";
                document.getElementById("bmodificar").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '2') {               
                document.getElementById("matricular").className += " active";
                document.getElementById("bmatricular").className += " active";
                document.getElementById("titul").className += " hidden";
            }
            if (id == '3') {               
                document.getElementById("comptabilitat").className += " active";
                document.getElementById("bcomptabilitat").className += " active";
                document.getElementById("titul").className += " hidden";
            }
        }
        function getURLParameter(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
          }
    </script>
</body>
</html>
