<?php
session_start();
$assignatura=$_REQUEST["assignatura"];
$dataalum=$_REQUEST["dataalum"];
$data25 = substr($dataalum,0,10);
$professor = $_SESSION['id'];
    $sql2 = "SELECT Assistencia.ID as ID, Alumnes.Nom as NOMAL, Alumnes.Cognom1 as COGN1,IDAssignatura, Alumnes.Cognom2 as COGN2, Data  FROM Assistencia JOIN Alumnes ON Assistencia.IDAlumnes = Alumnes.ID  WHERE Data LIKE  '$data25%' AND IDProfessor = $professor AND IDAssignatura = $assignatura";

	require_once('classes/connexio.php');
					
	$bd = new connexio();
	$temp = $bd->query($sql2);
        echo '<tr><th>Nom</th><th>Cognoms</th><th>mod</th><th>Guardar</th><th class="glyphicon glyphicon-refresh"></th></tr>';
	while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {
             
    ?>
    <tr>  
        <td><?php echo utf8_encode($row['NOMAL']) ; ?></td>
        <td><?php echo utf8_encode($row['COGN1']." ".$row['COGN2']." ".$row['IDAssignatura']); ?></td>
        <td><button class="btn btn-success btn-sm"  id="guardar" onclick="guardar(<?php echo $row['ID'];?>)"/>Guardar</button></td>
        <td id="mostrar<?php echo $row['ID'];?>"></td>
    </tr>

    <?php
	}
$bd->close();