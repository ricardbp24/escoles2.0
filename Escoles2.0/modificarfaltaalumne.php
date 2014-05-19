<?php

/* 
 * Modificar la falta de l'alumne
 */
require_once 'classes/connexio.php';
$id = $_POST['IDASS'];
$falta = $_POST['valorfalta'];

    $bd = new connexio();
    if ($bd->query("UPDATE Assistencia SET Falta = '$falta' WHERE ID = $id")) {

        header("Location:indexprofessor.php?pe=2&missatge=falta-canviada");

    } else {
            echo "Error: %s\n", $bd->error;
    }