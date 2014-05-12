<?php
ob_start();
require_once 'classes/usuari.php';

$nom = utf8_decode(filter_input(INPUT_POST,'nom'));
$c1 = utf8_decode(filter_input(INPUT_POST,'cognom1'));
$c2 = utf8_decode(filter_input(INPUT_POST,'cognom2'));
$data = utf8_decode(filter_input(INPUT_POST,'data'));
$t1 = utf8_decode(filter_input(INPUT_POST,'telefon1'));
$t2 = utf8_decode(filter_input(INPUT_POST,'telefon2'));
$dni = utf8_decode(filter_input(INPUT_POST,'dni'));
$direccio = utf8_decode(filter_input(INPUT_POST,'direccio'));
$cp = utf8_decode(filter_input(INPUT_POST,'cp'));
$p = utf8_decode(filter_input(INPUT_POST,'poblacio'));
$ae = utf8_decode(filter_input(INPUT_POST,'ae'));
$pc = utf8_decode(filter_input(INPUT_POST,'contacte'));
$ccc = utf8_decode(filter_input(INPUT_POST,'ccc'));
$alta = filter_input(INPUT_POST,'alta');

define('ruta',$_SERVER['DOCUMENT_ROOT'].'/fotos/');
  $foto = $_FILES['foto']['name'];
  $fototmp = $_FILES['foto']['tmp_name'];

$alumne = new alumne($dni);
$alumne->setNom($nom);
$alumne->setCognom1($c1);
$alumne->setCognom2($c2);
$alumne->setDatanaixement($data);
$alumne->setTelefon1($t1);
$alumne->setTelefon2($t2);
$alumne->setCarrer($direccio);
$alumne->setCpostal($cp);
$alumne->setPoblacio($p);
$alumne->setCelectronic($ae);
$alumne->setFoto($foto);
$alumne->setCCC($ccc);
$alumne->setPresonacontacte($pc);
if ($alta == "on") {
  $alumne->setAlta(true);
} else {
  $alumne->setAlta(false);
}

if ($alumne->actualitzar()){
  move_uploaded_file($fototmp, ruta.$foto);
  header('Location: indexadministratiu.php');
} else {
  echo "error";
}