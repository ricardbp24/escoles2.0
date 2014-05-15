<?php
ob_start();
require_once 'classes/matricula.php';

$alumnes = $_POST['alumnematricula'];
$assignatures = $_POST['assignaturamatricula'];
$c = $_POST['curs'];
$text = "";

foreach ($alumnes as $al) {
  foreach ($assignatures as $as) {
    $matricula = new matricula($al, $as, $c);
    $text=$text.$matricula->insertar();
  }
} ?>

<?php require_once 'head.php';?>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.ca.js" charset="UTF-8"></script>
</head>
<body>
  <?php require_once 'barranav.php';?>
  <div class="alert alert-info"><?php echo utf8_encode($text); ?></div>
<center><button class="btn btn-success btn-lg" onclick="window.location.href='indexadministratiu.php?pe=2'">Tornar</button></center>
</body>