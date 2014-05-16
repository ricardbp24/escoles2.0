<?php
session_start();
$assignatura=$_REQUEST["assignatura"];
$dataalum=$_REQUEST["dataalum"];
$data25 = substr($dataalum,0,10);
$professor = $_SESSION['id'];
    $sql2 = "SELECT Assistencia.ID as ID, Alumnes.Nom as NOMAL, Alumnes.Cognom1 as COGN1, Falta,IDAssignatura, Alumnes.Cognom2 as COGN2, Data  FROM Assistencia JOIN Alumnes ON Assistencia.IDAlumnes = Alumnes.ID  WHERE Data LIKE  '$data25%' AND IDProfessor = $professor AND IDAssignatura = $assignatura ORDER BY Cognom1 ASC";

	require_once('classes/connexio.php');
					
	$bd = new connexio();
	$temp = $bd->query($sql2);
        
	while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {
             $falta = $row['Falta'];
    ?>
    <tr>  
        <td><?php echo utf8_encode($row['COGN1']." ".$row['COGN2'].", ".$row['NOMAL']); ?></td>
        <td><?php echo utf8_encode($row['Data']); ?></td>
        <td><?php  echo utf8_encode($row['Falta']);  ?></td>
        <td>
            <select class="form-control input-sm" name="valorfalta">
                <option value="Falta">Falta</option>
                <option value="Retard">Retard</option>
            </select>
        </td>
        <td><button class="btn btn-success btn-sm"  id="guardar" onclick="guardar(<?php echo $row['ID'];?>)"/>Guardar</button></td>
        <td><button class="btn btn-danger btn-sm"  value="<?php echo $row['NOMAL']; ?>"/>Eliminar</button></td>
        
    </tr>

    <?php
	}
$bd->close();