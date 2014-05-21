<?php 
/**
 * @author Grup1
 * @version 0.1
 */
require_once 'head.php';
$aula = $_REQUEST['a'];
  include_once 'classes/connexio.php';
  include_once 'classes/aula.php';
  $bd = new connexio();
  $consulta = $bd->query("SELECT * FROM Aules WHERE ID=$aula");
  $resultat = $consulta->fetch_array(MYSQLI_ASSOC);
?>
<script>
   $(document).ready(function() {
     $('input[name="nom_aula"]').val("<?php echo utf8_encode($resultat['Nom_Aula']); ?>");
     $('input[name="capacitat"]').val("<?php echo utf8_encode($resultat['Capacitat']); ?>");
     $('input[name="planta"]').val("<?php echo utf8_encode($resultat['Planta']); ?>");
   });
</script>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>

</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="">
    <h3>Modificació d'aules </h3>
    <center>
      <div class="col-md-9">
      <form class="form" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-4">
          <label class="sr-only" for="nom_aula">Nom aula</label>
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
        <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success" onclick = "this.form.action ='actualitzaaula.php?a=<?php echo $aula['ID'] ?>'">Modificar Aula</button>
          <button type="submit" class="btn btn-danger" onclick="javascript:history.go(-1)">Tornar sense desar</button>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12"></div>
      </form>
      </div>
    </center>

  </div>
</body>
</html>