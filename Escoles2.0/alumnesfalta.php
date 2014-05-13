<?php
    session_start();
    require_once('classes/assistencia.php');
    
    $idal = $_POST['al'];
    $idprofessor = $_SESSION['id'];
    $idassig = $_POST['assignatura'];
    $data=$_POST['data'];
    //var_dump($idalumne);
    
    

    
   
    foreach ($idal as $idalumne) {
        
        $assistencia = new assistencia($idalumne,$idprofessor,$idassig,$data);
        if ($assistencia->insertardata()){
        echo "Realitzat";
        }  
    }


       
 
