<?php

$b=$_REQUEST["b"];
    $sql = "SELECT Nom,Cognom1,Cognom2,Alumnes.ID, Data FROM Assistencia LEFT JOIN Alumnes ON Assistencia.IDAlumnes = Alumnes.ID WHERE IDAssignatura=";
	$sql = $sql.$b;
	echo "SQL:".$sql;
	require_once('classes/connexio.php');
					
	$bd = new connexio();
	$temp = $bd->query($sql); 
	while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {
             
    ?>
    
    <option value="<?php echo $row['ID'];?>"><?php echo $row['Nom']." ".$row['Cognom1'] ; ?></option>


    <?php
	}
$bd->close();