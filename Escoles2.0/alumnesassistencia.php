<?php

$b=$_REQUEST["b"];

//Requereix la classe connexio
require_once('classes/connexio.php');

$bd = new connexio();
$curs = $bd->query("SELECT ID FROM Cursos ORDER BY ID DESC LIMIT 1");
$c = $curs->fetch_array(MYSQLI_ASSOC);
//Senténcia SQL
$sql = "SELECT Alumnes.ID as IDALUMNE, Nom, Cognom1, Cognom2, Notes.ID as NOTES, Notes.ID_Assignatura, 1T, 2T, 3T FROM Alumnes JOIN Notes ON Notes.ID_Alumne = Alumnes.ID WHERE Notes.ID_Assignatura = $b AND Alumnes.ID in(SELECT IDAlumne FROM Matricules WHERE IDAssignatura = $b AND Curs =".$c['ID'].") ORDER BY Cognom1, Nom";

    $temp = $bd->query($sql); 
    
    //Recorrer l'array de la BD
    while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {       
    ?>
    <label>
        <input type="checkbox" value="<?php echo $row['IDALUMNE'];?>"  id="al[]" name="al[]" />
        <?php echo utf8_encode($row['Nom']." ".$row['Cognom1']." ".$row['Cognom2']) ; ?>
    </label>
    <?php
    }
//Tanquem conexio a la BD
$bd->close();