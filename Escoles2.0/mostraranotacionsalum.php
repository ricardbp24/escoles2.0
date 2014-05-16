<?php
session_start();
/* 
 * Mostrar anotacions
 */

$assignatura = $_REQUEST['assignatura'];
$alumnes = $_REQUEST['alumnes'];
$data = $_REQUEST['data'];
$curs = $_REQUEST['curs'];
$datamod = substr($data,0,10);
$professor = $_SESSION['id'];

$sql = "SELECT Anotacions.ID as ID, Alumnes.Nom as NOMAL, Alumnes.Cognom1 as COGN1,ID_Assignatura, Alumnes.Cognom2 as COGN2, Data, Anotacio  FROM Anotacions JOIN Alumnes ON Anotacions.ID_Alumne = Alumnes.ID  WHERE Data LIKE  '$datamod%' AND (ID_Professor = $professor AND ID_Assignatura = $assignatura AND IDCurs = $curs)";

    require_once('classes/connexio.php');
					
    $bd = new connexio();
    $temp = $bd->query($sql);
    while ($fila = $temp->fetch_array(MYSQLI_ASSOC)) {
    ?>    
        <tr>
            <td class="col-md-2"><?php echo utf8_encode($fila['NOMAL'].", ".$fila['COGN1']." ".$fila['COGN2']); ?></td>
            <td><?php echo utf8_encode($fila['Anotacio']); ?></td>
        </tr>
    <?php
}