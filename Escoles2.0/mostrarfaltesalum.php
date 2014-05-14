<?php
session_start();
$assignatura=$_REQUEST["assignatura"];
$dataalum=$_REQUEST["dataalum"];
$professor = $_SESSION['id'];
    $sql = "SELECT Assignatures.ID as ID, Alumnes.Nom as NOMAL, Alumnes.Cognom1 as COGN1, Alumnes.Cognom2 as COGN2, Data  FROM Assistencia JOIN Alumnes ON Assistencia.IDAlumnes = Alumnes.ID  WHERE IDAssignatura = $assignatura AND Data LIKE  '2014-05-14%' AND IDProfessor = $professor";

	require_once('classes/connexio.php');
					
	$bd = new connexio();
	$temp = $bd->query($sql);
        echo '<tr><th>Nom</th><th>Cognoms</th><th>1 Trimestre</th><th>2 Trimestre</th><th>3 Trimestre</th><th>Guardar</th><th class="glyphicon glyphicon-refresh"></th></tr>';
	while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {
             
    ?>
    <tr>  
        <td><?php echo utf8_encode($row['NOMAL']) ; ?></td>
        <td><?php echo utf8_encode($row['COGN1']." ".$row['COGN2']); ?></td>
        <td><button class="btn btn-success btn-sm"  id="guardar" onclick="guardar(<?php echo $row['ID'];?>)"/>Guardar</button></td>
        <td id="mostrar<?php echo $row['ID'];?>"></td>
    </tr>

    <?php
	}
$bd->close();

