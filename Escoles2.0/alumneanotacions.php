<?php
session_start();
/**
 * Introduir anotacions d'alumnes per assignatures
 * @author Grup1
 * @version 0.1
 */
    //Parametres  amb metòde $_POST
    $assignatura = $_POST['assignatura'];
    $alumnes = $_POST['alumnes'];
    $idprofessor = $_SESSION['id'];
    $curs = $_POST['curs'];
    $data2= $_POST['data2'];
    $anotacio = $_POST['anotacio'];

    //Requeriment de la classe anotació
    require_once ('classes/anotacio.php');
    
    //Cridar al constructor de anotació
    $anotacions = new anotacio($assignatura,$idprofessor,$alumnes,  utf8_decode($anotacio),$curs,$data2);
    $anotacions->insertanotacio();