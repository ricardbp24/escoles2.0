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

define('ruta',$_SERVER['DOCUMENT_ROOT'].'/fotos/');

$foto = $_FILES['foto']['name'];
$fototmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($fototmp, ruta.$foto);

$alumne = new nouAlumne($dni,$nom,$c1,$c2,$data,null,$t1,$t2,$direccio,$cp,$p,$ae,$foto,$ccc,$pc);
if ($alumne->insertar()){
  $_SESSION['nouusuari']=1;
  header('Location: indexadministratiu.php');
} else {
  echo "error";
}