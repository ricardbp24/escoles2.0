<?php
session_start();
/**
 * Mostrar anotacions alumnes
 * @author Grup1
 * @version 0.1
 */
    //Parametres  del $_REQUEST de AKAX
    $assignatura = $_REQUEST['assignatura'];
    $alumnes = $_REQUEST['alumnes'];
    $data = $_REQUEST['data'];
    $curs = $_REQUEST['curs'];
    $datamod = substr($data,0,10);
    $professor = $_SESSION['id'];
    
    //SELECT per mostrar les anotacions
    $sql = "SELECT Anotacions.ID as ID, Alumnes.Nom as NOMAL, Alumnes.Cognom1 as COGN1,ID_Assignatura, Alumnes.Cognom2 as COGN2, Data, Anotacio  FROM Anotacions JOIN Alumnes ON Anotacions.ID_Alumne = Alumnes.ID  WHERE Data LIKE  '$datamod%' AND (ID_Professor = $professor AND ID_Assignatura = $assignatura AND IDCurs = $curs)";
    
    //Classe per poder fer la connexió a la BD
    require_once('classes/connexio.php');
    
    //Establim connexió a la BD
    $bd = new connexio();
    
    //realitzem la consulta sql
    $temp = $bd->query($sql);
    
    //Loop amb while  per poder mostrar tots els camps de la base de dades
    while ($fila = $temp->fetch_array(MYSQLI_ASSOC)) {
    ?>    
        <tr>
            <td class="col-md-2"><?php echo utf8_encode($fila['NOMAL'].", ".$fila['COGN1']." ".$fila['COGN2']); ?></td>
            <td><?php echo utf8_encode($fila['Data']); ?> </td>
            <td><?php echo utf8_encode($fila['Anotacio']); ?></td>
        </tr>
    <?php
    }//Tancar el loop While
    //Tancar la connexió a la BD
    $bd->close();
   