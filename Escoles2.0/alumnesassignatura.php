<?php
//SELECT 1T, 2T, 3T FROM Notes WHERE ID_Assignatura in(SELECT ID FROM Alumnes WHERE ID in(SELECT ID FROM Assignatures WHERE ID=
//SELECT aules.ID, Pis, Numero, Capacitat, NumPC, COUNT(aules.ID) AS assignats FROM (aules INNER JOIN alumnesaules ON aules.ID=alumnesaules.IDAula) GROUP BY aules.ID ORDER BY aules.ID ".$ordre
//SELECT Nom,Cognom1,Cognom2,Notes.ID,1T, 2T, 3T FROM Notes LEFT JOIN Alumnes ON Notes.ID_Alumne = Alumnes.ID WHERE ID_Assignatura in(SELECT ID FROM Alumnes WHERE ID in(SELECT ID FROM Assignatures WHERE ID=
$q=$_REQUEST["q"];
$c=$_REQUEST["c"];

    $sql = "SELECT Alumnes.ID, Nom, Cognom1, Cognom2, Notes.ID as NOTES, Notes.ID_Assignatura, 1T, 2T, 3T FROM Alumnes JOIN Notes ON Notes.ID_Alumne = Alumnes.ID WHERE Notes.ID_Assignatura = $q AND Alumnes.ID in(SELECT IDAlumne FROM Matricules WHERE IDAssignatura = $q AND Curs =$c) ORDER BY Cognom1, Nom";

	require_once('classes/connexio.php');
					
	$bd = new connexio();
	$temp = $bd->query($sql);
        echo '<tr><th>Nom</th><th>Cognoms</th><th>1 Trimestre</th><th>2 Trimestre</th><th>3 Trimestre</th><th>Guardar</th><th class="glyphicon glyphicon-refresh"></th></tr>';
	while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {
             
    ?>
    <tr>  
        <td><?php echo utf8_encode($row['Nom']) ; ?></td>
        <td><?php echo utf8_encode($row['Cognom1']." ".$row['Cognom2']); ?></td>
        <td><input class="form-control input-sm" id="primer<?php echo $row['NOTES'];?>" value="<?php echo $row['1T'] ; ?>" /></td>
        <td><input class="form-control input-sm" id="segon<?php echo $row['NOTES'];?>" value="<?php echo $row['2T'] ; ?>"/></td>
        <td><input class="form-control input-sm" id="tercer<?php echo $row['NOTES'];?>" value="<?php echo $row['3T'] ; ?>"/></td>
        <td><button class="btn btn-success btn-sm"  id="guardar" onclick="guardar(<?php echo $row['NOTES'];?>)"/>Guardar</button></td>
        <td id="mostrar<?php echo $row['NOTES'];?>"></td>
    </tr>

    <?php
	}
$bd->close();
