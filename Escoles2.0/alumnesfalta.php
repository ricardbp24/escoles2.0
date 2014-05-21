<?php
    session_start();
    
/**
 * Alumnes per introduir falta
 * @author Grup1
 * @version 0.1
 */
    //Requeriment de la classe assistencia
    require_once('classes/assistencia.php');
    
    //Valors $_POST
    $idal = $_POST['al'];
    $idprofessor = $_SESSION['id'];
    $idassig = $_POST['assignatura'];
    $data=$_POST['data'];
    $falta= 'Falta';
    
    //Recorrer l'array de idalumne
    foreach ($idal as $idalumne) {
        $assistencia = new assistencia($idalumne,$idprofessor,$idassig,$falta,$data);
        if ($assistencia->insertardata()){
        }  
    }


       
 
