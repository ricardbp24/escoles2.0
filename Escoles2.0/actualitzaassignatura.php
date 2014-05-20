<?php
ob_start();
require_once 'classes/assignatura.php';
$id = $_REQUEST['a'];

$assignatura1 = utf8_decode(filter_input(INPUT_POST,'assignatura'));
$professor = utf8_decode(filter_input(INPUT_POST,'professor'));
$horari = utf8_decode(filter_input(INPUT_POST,'horari'));
$preu = utf8_decode(filter_input(INPUT_POST,'preu'));

  $assignatura = new assignatura($id);
  $assignatura->setAssignatura($assignatura1);
  $assignatura->setIdProfessor($professor);
  $assignatura->setHorari($horari);
  $assignatura->setPreu($preu);
  print $assignatura1;
  if ($assignatura->actualitzaAssignatura()) header('Location: indexdirector.php');
  else echo "Error";

