<?php

	require_once('classes/connexio.php');
					
	$bd = new connexio();
	if ($bd->query('INSERT INTO Assistencia (IDAlumnes,IDProfessor,IDAssignatura,DAta) VALUES 
        ('.$alum.','.$prof.','.$assign.','.$data.')')){
            echo "SI";
    } else {
            echo "Error: %s\n", $bd->error;
    }
    $bd->close();
