<?php require_once 'head.php';?>
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" type="text/css" media="all" />
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
  <?php require_once 'barranav.php';?>
  <script></script>
<?php
$mes = $_POST['mes'];
require_once 'classes/assentament.php';

$facturar = new assentament();
if ($facturar->facturar()) { ?>
  <div class="col-md-12 success">
    <h1>S'ha facturat correctament</h1>
  </div>
<?php } else { ?>
   <div class="col-md-12 success">
    <h1>La remesa d'aquest mes ja existeix, revisa les dades</h1>
  </div>
<?php }