<?php
ob_start();
require_once 'classes/usuari.php';

$nom = filter_input(INPUT_POST,'nom');
$c1 = filter_input(INPUT_POST,'cognom1');
$c2 = filter_input(INPUT_POST,'cognom2');
$data = filter_input(INPUT_POST,'data');
$t1 = filter_input(INPUT_POST,'telefon1');
$t2 = filter_input(INPUT_POST,'telefon2');
$dni = filter_input(INPUT_POST,'dni');
$direccio = filter_input(INPUT_POST,'direccio');
$cp = filter_input(INPUT_POST,'cp');
$p = filter_input(INPUT_POST,'poblacio');
$ae = filter_input(INPUT_POST,'ae');
$pc = filter_input(INPUT_POST,'contacte');
$ccc = filter_input(INPUT_POST,'ccc');

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