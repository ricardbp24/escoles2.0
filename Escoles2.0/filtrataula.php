<?php
$criteri = $_REQUEST['c']; ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nom aula</th>
      <th>Capacitat</th>
      <th>Planta</th>
    </tr>
  </thead>
  <tbody>
    <?php
      include_once 'classes/connexio.php';
      $bd = new connexio();
      $consulta = $bd->query("SELECT ID FROM Aules  WHERE Nom_Aula LIKE '%".$criteri."%'");
      $totalfiles = $consulta->num_rows;
      $perpagina = 5;
      $totalpagines = $totalfiles / $perpagina;
      if (($totalfiles % $perpagina)>0) {
        $totalpagines++;
      }
      $ini = $perpagina*($numpag-1);
      if ($ini<0) { $ini=0;}
      $fi = $perpagina;
      $consulta2 = $bd->query("SELECT ID,Nom_Aula,Capacitat,Planta FROM Aules WHERE Nom_Aula LIKE '%".$criteri."%'  ORDER BY Planta,Capacitat LIMIT $ini,$fi");
      $i=1;
      while ($aula = $consulta2->fetch_array(MYSQLI_ASSOC)) { ?>
    <tr <?php if ($aula['Capacitat'] == 0) { echo 'class="warning"'; } ?>>
      <td><?php echo utf8_encode($aula['Nom_Aula']); ?></td>
      <td><?php echo utf8_encode($aula['Capacitat']); ?></td>
      <td><?php echo utf8_encode($aula['Planta']); ?></td>
      <td><button type="button" class="btn btn-success btn-xs" onclick="window.location.href='modificaaula.php?a=<?php echo $aula['ID'] ?>'">Modificar</button></td>
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
