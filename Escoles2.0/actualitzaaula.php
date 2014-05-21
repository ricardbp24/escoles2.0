<?php
/**
 * @author Grup1
 * @version 0.1
 */
ob_start();
require_once 'classes/aula.php';
$id = $_REQUEST['a'];

$nom_aula = utf8_decode(filter_input(INPUT_POST,'nom_aula'));
$capacitat = utf8_decode(filter_input(INPUT_POST,'capacitat'));
$planta = utf8_decode(filter_input(INPUT_POST,'planta'));

  $aula = new aula($id);
  $aula->setNomAula($nom_aula);
  $aula->setCapacitat($capacitat);
  $aula->setPlanta($planta);

  if ($aula->actualitzaAula()) header('Location: indexdirector.php');
  else echo "Error";

