<?php
/**
 * @author Grup1
 * @version 0.1
 */
    session_start();
    require_once('classes/assistencia.php');
    
    //Valors $_POST
    $idal = $_POST['al'];
    $idprofessor = $_SESSION['id'];
    $idassig = $_POST['assignatura'];
    $data=$_POST['data'];
    $falta= 'Falta';
    //var_dump($idalumne);
    
    //Recorrer l'array de idalumne
    foreach ($idal as $idalumne) {
        $assistencia = new assistencia($idalumne,$idprofessor,$idassig,$falta,$data);
        if ($assistencia->insertardata()){
        }  
    }


       
 
