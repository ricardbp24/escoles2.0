<?php
/**
 * Eliminar falta de l'alumne
 * @author Grup1
 * @version 0.1
 */
    //Requeriment de la classe connexio
    require_once 'classes/connexio.php';
    $id = $_GET['ID'];
    $bd = new connexio();
    if ($bd->query("DELETE FROM Assistencia WHERE ID = ".$id)) {

        header("Location:indexprofessor.php?pe=2&missatge=alum-eliminat");

    } else {
            echo "Error: %s\n", $bd->error;
    }