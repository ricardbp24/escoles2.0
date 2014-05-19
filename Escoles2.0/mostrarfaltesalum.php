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
            <form action='modificarfaltaalumne.php' method='post'>
            <select style="width: 90px; float:left;" class="form-control input-sm" name="valorfalta">
                <option value="Falta">Falta</option>
                <option value="Retard">Retard</option>
            </select>
        
            <input type="hidden" name="IDASS"  value="<?php echo $row['ID']; ?>"/> 
            <button style="float: right;" class="btn btn-success btn-sm" type="submit"  />Guardar</button>
        </form>
           
        </td>
        <td><button class="btn btn-danger btn-sm" onclick="if(confirm('Vols eliminar?')) window.location.href='eliminarfaltaalum.php?ID=<?php echo $row['ID']; ?>'" value="<?php echo $row['ID']; ?>"/>Eliminar</button></td>
     
    </tr>

    <?php
	}
        ?>
    
</form>
    
    <?php
$bd->close();