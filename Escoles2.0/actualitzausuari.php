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
$pass = utf8_decode(filter_input(INPUT_POST,'contrasenya2'));
$tipo = utf8_decode(filter_input(INPUT_POST,'tipo'));
$alta = filter_input(INPUT_POST,'alta');

define('ruta',$_SERVER['DOCUMENT_ROOT'].'/fotos/');
  $foto = $_FILES['foto']['name'];
  $fototmp = $_FILES['foto']['tmp_name'];

if($tipo == 1){
	$usuari = new director($dni);
	$usuari->setNom($nom);
	$usuari->setCognom1($c1);
	$usuari->setCognom2($c2);
	$usuari->setDatanaixement($data);
	$usuari->setTelefon1($t1);
	$usuari->setTelefon2($t2);
	$usuari->setCarrer($direccio);
	$usuari->setCpostal($cp);
	$usuari->setPoblacio($p);
	$usuari->setCelectronic($ae);
	$usuari->setFoto($foto);
	$usuari->setPassword($pass);
	if ($alta == "on") $usuari->setAlta(true);
	else $usuari->setAlta(false);

	if ($usuari->actualitzarDirector()){
	  move_uploaded_file($fototmp, ruta.$foto);
	  header('Location: indexdirector.php');
	} else echo "Error";
}
elseif ($tipo == 2){
	$usuari = new professor($dni);
	$usuari->setNom($nom);
	$usuari->setCognom1($c1);
	$usuari->setCognom2($c2);
	$usuari->setDatanaixement($data);
	$usuari->setTelefon1($t1);
	$usuari->setTelefon2($t2);
	$usuari->setCarrer($direccio);
	$usuari->setCpostal($cp);
	$usuari->setPoblacio($p);
	$usuari->setCelectronic($ae);
	$usuari->setFoto($foto);
	$usuari->setPassword($pass);
	if ($alta == "on") $usuari->setAlta(true);
	else $usuari->setAlta(false);

	if ($usuari->actualitzarProfessor()){
	  move_uploaded_file($fototmp, ruta.$foto);
	  header('Location: indexdirector.php');
	} else echo "Error";
}
else{
	$usuari = new administratiu($dni);
	$usuari->setNom($nom);
	$usuari->setCognom1($c1);
	$usuari->setCognom2($c2);
	$usuari->setDatanaixement($data);
	$usuari->setTelefon1($t1);
	$usuari->setTelefon2($t2);
	$usuari->setCarrer($direccio);
	$usuari->setCpostal($cp);
	$usuari->setPoblacio($p);
	$usuari->setCelectronic($ae);
	$usuari->setFoto($foto);
	$usuari->setPassword($pass);
	if ($alta == "on") $usuari->setAlta(true);
	else $usuari->setAlta(false);

	if($pass == '' and $foto!='' ){
		if ($usuari->actualitzarAdministratiuFoto()){
		  move_uploaded_file($fototmp, ruta.$foto);
		  header('Location: indexdirector.php');
		} else echo "Error1";
	}
	elseif($foto == '' and $pass == ''){
		if ($usuari->actualitzarAdministratiuSinFoto()){
		  header('Location: indexdirector.php');
		} else echo "Error2";
	}
	elseif($foto !='' and $pass != ''){
		if($usuari->actualitzarAdministratiuFotoIPass()){
		move_uploaded_file($fototmp, ruta.$foto);
		  header('Location: indexdirector.php');
		} else echo "Error3";
	}
	elseif($foto == '' and $pass !='') {
		print $pass;
		if($usuari->actualitzarAdministratiuPass()){
			header('Location: indexdirector.php');
		}else print "Error4";
	}else print "Error inesperat";

}
