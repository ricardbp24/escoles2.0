<?php
session_start();
/**
 * Introduir anotacions d'alumnes per assignatures
 * @author Grup1
 * @version 0.1
 */

    $assignatura = $_POST['assignatura'];
    $alumnes = $_POST['alumnes'];
    $idprofessor = $_SESSION['id'];
    $curs = $_POST['curs'];
    $data2= $_POST['data2'];
    $anotacio = $_POST['anotacio'];

    //echo "Assignatura: ".$assignatura."<br>alumnes: ".$alumnes."<br>IDPROF: ".$curs."<br>data: ".$data."<br>anotacio: ".$anotacio."<br>";
    require_once ('classes/anotacio.php');

    $anotacions = new anotacio($assignatura,$idprofessor,$alumnes,  utf8_decode($anotacio),$curs,$data2);
    $anotacions->insertanotacio();