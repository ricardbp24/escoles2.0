<?php
    /**
     * Guardar nota
     * @author Grup1
     * @version 0.1
    */
    //Requeriment de la classe connexio
    require_once('classes/connexio.php');
    //Crear connexio
    $bd = new connexio();
    
    //Valors de la nota amb $_REQUEST de AJAX
    $g=$_REQUEST["g"];
    $primer=$_REQUEST["primer"];
    $segon=$_REQUEST["segon"];
    $tercer=$_REQUEST["tercer"];
    
    //Nota inferior a -1 o major de de 11
    if (($primer > -1) && ($segon > -1) && ($tercer > -1) && ($primer < 11) && ($segon < 11) && ($tercer < 11)) {
        
        //Introdueix els camps en la base de dades
        $bd->query("UPDATE Notes SET 1T = $primer , 2T = $segon , 3T = $tercer  WHERE ID = $g ");
        echo "<span style='color: #18bc9c;' class='glyphicon glyphicon-ok'></span>";  
    
    //Sino es realitza la opció anterior
    }else { 
	echo "<span style='color: red;' class='glyphicon glyphicon-remove-circle'></span>";
    }
    $bd->close();
