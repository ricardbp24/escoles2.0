<?php
/**
 * Mostrar alumnes assignatura i les seves notes
 * @author Grup1
 * @version 0.1
 */

    //Parametres recollits pel $_REQUEST de AJAX
    $q=$_REQUEST["q"];
    $c=$_REQUEST["c"];
    
    //SELECT per recollir l'informació dels alumnes
    $sql = "SELECT Alumnes.ID, Nom, Cognom1, Cognom2, Notes.ID as NOTES, Notes.ID_Assignatura, 1T, 2T, 3T FROM Alumnes JOIN Notes ON Notes.ID_Alumne = Alumnes.ID WHERE Notes.ID_Assignatura = $q AND Alumnes.ID in(SELECT IDAlumne FROM Matricules WHERE IDAssignatura = $q AND Curs =$c) ORDER BY Cognom1, Nom";
    
    //Classe per poder fer la connexió a la BD
    require_once('classes/connexio.php');
    
    //Establim connexió a la BD
    $bd = new connexio();
    
    //realitzem la consulta sql
    $temp = $bd->query($sql);
    
    //Loop amb while  per poder mostrar tots els camps de la base de dades
    while ($row = $temp->fetch_array(MYSQLI_ASSOC)) {        
?>
    <tr>  
        <td><?php echo utf8_encode($row['Cognom1']." ".$row['Cognom2'].", ".$row['Nom']) ; ?></td>
        <td><input  class="form-control input-sm" id="primer<?php echo $row['NOTES'];?>" value="<?php echo $row['1T'] ; ?>" /></td>
        <td><input class="form-control input-sm" id="segon<?php echo $row['NOTES'];?>" value="<?php echo $row['2T'] ; ?>"/></td>
        <td><input class="form-control input-sm" id="tercer<?php echo $row['NOTES'];?>" value="<?php echo $row['3T'] ; ?>"/></td>
        <td><button class="btn btn-success btn-sm"  id="guardar" onclick="guardar(<?php echo $row['NOTES'];?>)"/>Guardar</button></td>
        <td id="mostrar<?php echo $row['NOTES'];?>"></td>
    </tr>
<?php
    }
    //Tanquem la connexió BD
    $bd->close();
