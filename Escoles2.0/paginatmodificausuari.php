<?php
/**
 * @author Grup1
 * @version 0.1
 */
$numpag = $_REQUEST['npag']; ?>
<table class="table table-hover">
<thead>
  <tr>
    <th>Nom</th>
    <th>Primer Cognom</th>
    <th>Segon Cognom</th>
    <th>DNI/NIE</th>
  </tr>
</thead>
<tbody>
  <?php
    include_once 'classes/connexio.php';
    $bd = new connexio();
    $consulta = $bd->query("SELECT ID FROM Usuaris");
    $totalfiles = $consulta->num_rows;
    $perpagina = 5;
    $totalpagines = $totalfiles / $perpagina;
    if (($totalfiles % $perpagina)>0) {
      $totalpagines++;
    }
    $ini = $perpagina*($numpag-1);
    $fi = $perpagina;
    $consulta2 = $bd->query("SELECT ID,Nom,Cognom1,Cognom2,DNI,Alta_Baixa FROM Usuaris ORDER BY Cognom1,Cognom2,Nom LIMIT $ini,$fi");$i=1;
    while ($usuari = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
  <tr <?php if ($usuari['Alta_Baixa'] == 0) { echo 'class="warning"'; } ?>>
    <td><?php echo utf8_encode($usuari['Nom']); ?></td>
    <td><?php echo utf8_encode($usuari['Cognom1']); ?></td>
    <td><?php echo utf8_encode($usuari['Cognom2']); ?></td>
    <td><?php echo utf8_encode($usuari['DNI']); ?></td>
    <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificausuari.php?a=<?php echo $usuari['ID'] ?>'">Modificar</button></td>
  </tr>
    <?php $i++; } $bd->close(); ?>
</tbody>
</table>
<center>
<ul class="pagination pagination-sm">
  <?php for ($i=1;$i<=$totalpagines;$i++) { ?>
  <li><a href="#" onclick="paginar(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
  <?php } ?>
</ul>
</center>