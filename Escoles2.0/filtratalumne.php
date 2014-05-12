<?php
$criteri = $_REQUEST['c']; ?>
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
      $consulta = $bd->query("SELECT ID FROM Alumnes  WHERE Nom LIKE '%".$criteri."%' OR Cognom1 LIKE '%".$criteri."%' OR Cognom2 LIKE '%".$criteri."%'");
      $totalfiles = $consulta->num_rows;
      $perpagina = 5;
      $totalpagines = $totalfiles / $perpagina;
      if (($totalfiles % $perpagina)>0) {
        $totalpagines++;
      }
      $ini = $perpagina*($numpag-1);
      if ($ini<0) { $ini=0;}
      $fi = $perpagina;
      $consulta2 = $bd->query("SELECT ID,Nom,Cognom1,Cognom2,DNI FROM Alumnes WHERE Nom LIKE '%".$criteri."%' OR Cognom1 LIKE '%".$criteri."%' OR Cognom2 LIKE '%".$criteri."%' ORDER BY Cognom1,Cognom2,Nom LIMIT $ini,$fi");
      $i=1;
      while ($alumne = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
    <tr>
      <td><?php echo utf8_encode($alumne['Nom']); ?></td>
      <td><?php echo utf8_encode($alumne['Cognom1']); ?></td>
      <td><?php echo utf8_encode($alumne['Cognom2']); ?></td>
      <td><?php echo utf8_encode($alumne['DNI']); ?></td>
      <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaalum.php/?a=<?php echo $alumne['ID'] ?>'">Modificar</button></td>
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
