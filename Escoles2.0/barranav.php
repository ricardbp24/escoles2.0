<div role="navigation" class="navbar navbar-inverse navbar-static-top">
 <div class="navbar-inner">		
    <div class="container">
      <div class="navbar-header">
        <button type="button" data-target="#navbar-main" data-toggle="collapse" class="navbar-toggle">
          <span class="sr-only">Menú</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"><b>Escoles 2.0</b></a>
      </div>
      <div class="navbar-collapse collapse" id="navbar-main">
        <ul class="nav navbar-nav">
          <?php
          require_once 'classes/connexio.php';
          $db=new connexio();

          $sql = $db->query("SELECT Nom,Cognom1,Cognom2 FROM Usuaris WHERE ID = ".$_SESSION['id']);
          $resultat = $sql->fetch_array(MYSQLI_ASSOC);
          $db->close() ?>
          <p class="navbar-text"><?php echo $resultat['Nom'].' '.$resultat['Cognom1'].' '.$resultat['Cognom2'] ?></p>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Sortir</a></li>
        </ul>
      </div>
    </div>
 </div>
</div>