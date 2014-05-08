<?php require_once 'head.php';?>
</head>
<body>
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
		        <a class="navbar-brand">Escoles 2.0</a>
		    </div>
		<div class="navbar-collapse collapse" id="navbar-main">
				<ul class="nav navbar-nav">
					<?php
					require_once 'classes/connexio.php';
					$db=new connexio();
					
					$sql = $db->query("SELECT Nom,Cognom1,Cognom2 FROM Usuaris");
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
  <div class="container">
    <div class="row">
      <div class="col-md-12 bhoechie-tab-container">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
            <div class="list-group">
              <a href="#" class="list-group-item active text-center">
                <h4 class="glyphicon glyphicon-user"></h4><br/>Crear Alumnes
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-pencil"></h4><br/>Modificar Alumnes
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-list"></h4><br/>Matricular
              </a>
              <a href="#" class="list-group-item text-center">
                <h4 class="glyphicon glyphicon-euro"></h4><br/>Comptabilitat
              </a>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
            <!-- Crear alumnes -->  
            <div class="bhoechie-tab-content active">
                  <center>

                  </center>
              </div>

              <!-- Modificar alumnes -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

              <!-- Matricular -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

              <!-- Comptabilitat -->
              <div class="bhoechie-tab-content">
                  <center>

                  </center>
              </div>

          </div>
      </div>
    </div>
  </div>    
    
</body>
</html>
