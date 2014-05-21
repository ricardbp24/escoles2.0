<?php require_once 'head.php';
/**
 * @author Grup1
 * @version 0.1
 */
$assignatura = $_REQUEST['a'];
  include_once 'classes/connexio.php';
  include_once 'classes/assignatura.php';
  $bd = new connexio();
  $consulta = $bd->query("SELECT * FROM Assignatures WHERE ID=$assignatura");
  $resultat = $consulta->fetch_array(MYSQLI_ASSOC);
?>
<script>
   $(document).ready(function() {
     $('input[name="assignatura"]').val("<?php echo utf8_encode($resultat['Assignatura']); ?>");
     $('input[name="professor"]').val("<?php echo utf8_encode($resultat['Professor']); ?>");
     $('input[name="horari"]').val("<?php echo utf8_encode($resultat['Horari']); ?>");
     $('input[name="preu"]').val("<?php echo utf8_encode($resultat['Preu']); ?>");
   });
</script>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>

</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="">
    <h3>Modificar assignatures </h3>
    <center>
      <div class="col-md-9">
      <form class="form" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-4">
          <label class="sr-only" for="assignatura">Assignatura</label>
          <input type="text" class="form-control" name="assignatura" placeholder="Assignatura" required="required">
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
          <label class="sr-only" for="horari">Horari</label>
          <input type="text" class="form-control" name="horari" placeholder="Horari" required="required">
        </div>
        <div class="form-group col-md-4">
          <label class="sr-only" for="preu">Preu</label>
          <input type="text" class="form-control" name="preu" placeholder="Preu" required="required">
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-md-12">
          <button type="submit" class="btn btn-success" onclick = "this.form.action ='actualitzaassignatura.php?a=<?php echo $assignatura['ID'] ?>'">Modificar Assignatura</button>
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