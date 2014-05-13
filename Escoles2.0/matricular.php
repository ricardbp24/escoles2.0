<?php
ob_start();
require_once 'classes/matricula.php';

$alumnes = $_POST['alumnematricula'];
$assignatures = $_POST['assignaturamatricula'];
$c = $_POST['curs'];

foreach ($alumnes as $al) {
  foreach ($assignatures as $as) {
    $matricula = new matricula($al, $as, $c);
    if ($matricula->insertar()){
      echo 'Alumne '.$al.' amb assignatura '.$as.' Matriculat correctament';
    }
  }
}