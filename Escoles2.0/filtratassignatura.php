<?php
/**
 * @author Grup1
 * @version 0.1
 */
$criteri = $_REQUEST['c']; ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Assignatura</th>
      <th>Professor</th>
      <th>Horari</th>
      <th>Horari</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once 'classes/connexio.php';
      $bd = new connexio();
      $consulta = $bd->query("SELECT ID FROM Assignatures  WHERE Assignatura LIKE '%".$criteri."%'");
      $totalfiles = $consulta->num_rows;
      $perpagina = 5;
      $totalpagines = $totalfiles / $perpagina;
      if (($totalfiles % $perpagina)>0) {
        $totalpagines++;
      }
      $ini = $perpagina*($numpag-1);
      if ($ini<0) { $ini=0;}
      $fi = $perpagina;
      $consulta2 = $bd->query("SELECT ID,Assignatura,Professor,Horari,Preu FROM Assignatures WHERE Assignatura LIKE '%".$criteri."%'  ORDER BY Assignatura LIMIT $ini,$fi");
      $i=1;
      while ($assignatura = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
    <tr <?php if ($assignatura['Preu'] == 0) { echo 'class="warning"'; } ?>>
      <td><?php echo utf8_encode($assignatura['Assignatura']); ?></td>
      <td><?php echo utf8_encode($assignatura['Professor']); ?></td>
      <td><?php echo utf8_encode($assignatura['Horari']); ?></td>
      <td><?php echo utf8_encode($assignatura['Preu']); ?></td>
      <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaassignatura.php?a=<?php echo $assignatura['ID'] ?>'">Modificar</button></td>
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
