<?php
  // Enllaç a la connexió a la base de dades
  class connexio extends mysqli {
     public function __construct($host,$user,$pass,$bd) {
          parent::__construct($host, $user, $pass, $bd);

        if (mysqli_connect_error()) {
              die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
     }
  }

  $host = $_POST["host"];
  $user = $_POST["usuari"];
  $pass = $_POST["Contrasenya"];
  $bas = $_POST["basedades"];

  $file = 'classes/connexio.php';
  $arxiu = fopen($file,'w+');
  fwrite($arxiu,"// Enllaç a la connexió a la base de dades".PHP_EOL);
  fclose($arxiu);
  $arxiu = fopen($file,'a');
  fwrite($arxiu,"class connexio extends mysqli {".PHP_EOL);
  fwrite($arxiu,"public function __construct() {".PHP_EOL);
  fwrite($arxiu,"parent::__construct(".$host.",".$user.",".$pass.",".$bas.");".PHP_EOL);
  fwrite($arxiu,"if (mysqli_connect_error()) {");
  fwrite($arxiu,"die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());".PHP_EOL);
  fwrite($arxiu,"} } }");
  fclose($arxiu);
  
  $bd = new connexio($host,$user,$pass,$bas);
  
  $bd->query("CREATE TABLE IF NOT EXISTS `Alumnes` (
    `ID` int(11) NOT NULL auto_increment,
    `Nom` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Cognom1` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Cognom2` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Data_Naixement` datetime NOT NULL,
    `Telefon1` varchar(9) collate utf8_spanish_ci NOT NULL,
    `Telefon2` varchar(9) collate utf8_spanish_ci NOT NULL,
    `DNI` varchar(9) collate utf8_spanish_ci NOT NULL,
    `Carrer` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Codi_Postal` varchar(5) collate utf8_spanish_ci NOT NULL,
    `Poblacio` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Correu_Electronic` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Foto` varchar(500) collate utf8_spanish_ci NOT NULL,
    `Persona_Contacte` varchar(300) collate utf8_spanish_ci NOT NULL,
    `Compte_Corrent` varchar(21) collate utf8_spanish_ci NOT NULL,
    `Alta_Baixa` tinyint(1) NOT NULL,
    PRIMARY KEY  (`ID`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
  
$bd->query("CREATE TABLE IF NOT EXISTS `Tipus_Usuari` (
    `ID` int(11) NOT NULL auto_increment,
    `Tipus` varchar(100) collate utf8_spanish_ci NOT NULL,
    PRIMARY KEY  (`ID`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;");

$bd->query("INSERT INTO `Tipus_Usuari` (`ID`, `Tipus`) VALUES
  (1, 'Director'),
  (2, 'Professor'),
  (3, 'Administratiu');");

$bd->query("CREATE TABLE IF NOT EXISTS `Usuaris` (
    `ID` int(11) NOT NULL auto_increment,
    `Nom` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Cognom1` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Cognom2` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Data_Naixement` datetime NOT NULL,
    `Telefon1` varchar(9) collate utf8_spanish_ci NOT NULL,
    `Telefon2` varchar(9) collate utf8_spanish_ci NOT NULL,
    `DNI` varchar(9) collate utf8_spanish_ci NOT NULL,
    `Password` varchar(30) collate utf8_spanish_ci NOT NULL,
    `Carrer` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Codi_Postal` int(5) NOT NULL,
    `Poblacio` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Correu_Electronic` varchar(255) collate utf8_spanish_ci NOT NULL,
    `Foto` varchar(500) collate utf8_spanish_ci NOT NULL,
    `Tipus` int(11) NOT NULL,
    `Alta_Baixa` tinyint(1) NOT NULL default '1',
    PRIMARY KEY  (`ID`),
    UNIQUE KEY `ID` (`ID`),
    FOREIGN KEY (Tipus) REFERENCES Tipus_Usuari(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;");
  
$bd->query("INSERT INTO `Usuaris` (`ID`, `Nom`, `Cognom1`, `Cognom2`, `Data_Naixement`, `Telefon1`, `Telefon2`, `DNI`, `Password`, `Carrer`, `Codi_Postal`, `Poblacio`, `Correu_Electronic`, `Foto`, `Tipus`, `Alta_Baixa`) VALUES
  (1, 'Administrador', 'Admin', 'Admin', '1970-01-01 00:00:00', '000000000', '000000000', '11111111A', 'q1w2e3r4', 'Administrador', 0, 'Poblacio', 'administrador@escoles20.cat', '', 1, 1);");
  
$bd->query("CREATE TABLE IF NOT EXISTS `Assignatures` (
    `ID` int(11) NOT NULL auto_increment,
    `Assignatura` varchar(150) collate utf8_spanish_ci NOT NULL,
    `Professor` int(11) NOT NULL,
    `Horari` varchar(100) collate utf8_spanish_ci NOT NULL,
    `Preu` float NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (Professor) REFERENCES Usuaris(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Anotacions` (
    `ID` int(11) NOT NULL auto_increment,
    `ID_Assignatura` int(11) NOT NULL,
    `ID_Professor` int(11) NOT NULL,
    `ID_Alumne` int(11) NOT NULL,
    `Anotacio` varchar(1500) collate utf8_spanish_ci NOT NULL,
    `IDCurs` int(11) NOT NULL,
    `Data` datetime NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (ID_Assignatura) REFERENCES Assignatures(ID),
    FOREIGN KEY (ID_Professor) REFERENCES Usuaris(ID),
    FOREIGN KEY (ID_Alumne) REFERENCES Alumnes(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Assentaments` (
    `ID` int(11) NOT NULL auto_increment,
    `ID_Alumne` int(11) NOT NULL,
    `Concepte` varchar(500) collate utf8_spanish_ci NOT NULL,
    `Import` float NOT NULL,
    `Data` datetime NOT NULL,
    `Facturat` tinyint(1) NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (ID_Alumne) REFERENCES Alumnes(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Assistencia` (
    `ID` int(11) NOT NULL auto_increment,
    `IDAlumnes` int(11) NOT NULL,
    `IDProfessor` int(11) NOT NULL,
    `IDAssignatura` int(11) NOT NULL,
    `Falta` varchar(11) collate latin1_spanish_ci NOT NULL,
    `Data` datetime NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (IDAlumnes) REFERENCES Alumnes(ID),
    FOREIGN KEY (IDProfessor) REFERENCES Usuaris(ID),
    FOREIGN KEY (IDAssignatura) REFERENCES Assignatures(ID)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Aules` (
    `ID` int(11) NOT NULL auto_increment,
    `Nom_Aula` varchar(50) collate utf8_spanish_ci NOT NULL,
    `Capacitat` int(11) NOT NULL,
    `Planta` int(11) NOT NULL,
    PRIMARY KEY  (`ID`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
  
$bd->query("CREATE TABLE IF NOT EXISTS `Aula_Alumnes` (
    `ID` int(11) NOT NULL auto_increment,
    `ID_Aula` int(11) NOT NULL,
    `ID_Alumne` int(11) NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (ID_Aula) REFERENCES Aules(ID),
    FOREIGN KEY (ID_Alumne) REFERENCES Alumnes(ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Aula_Professors` (
    `ID` int(11) NOT NULL auto_increment,
    `ID_Aula` int(11) NOT NULL,
    `ID_Professor` int(11) NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (ID_Aula) REFERENCES Aules(ID),
    FOREIGN KEY (ID_Professor) REFERENCES Usuaris(ID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Cursos` (
    `ID` int(11) NOT NULL auto_increment,
    `Curs` varchar(10) collate latin1_spanish_ci NOT NULL,
    PRIMARY KEY  (`ID`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;");
  
$bd->query("INSERT INTO `Cursos` (`ID`, `Curs`) VALUES
  (1, '2012-13'),
  (2, '2013-14');");

$bd->query("CREATE TABLE IF NOT EXISTS `Matricules` (
    `ID` int(11) NOT NULL auto_increment,
    `IDAlumne` int(11) NOT NULL,
    `IDAssignatura` int(11) NOT NULL,
    `Curs` int(11) NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (IDAssignatura) REFERENCES Assignatures(ID),
    FOREIGN KEY (IDAlumne) REFERENCES Alumnes(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

$bd->query("CREATE TABLE IF NOT EXISTS `Notes` (
    `ID` int(11) NOT NULL auto_increment,
    `ID_Alumne` int(11) NOT NULL,
    `ID_Assignatura` int(11) NOT NULL,
    `1T` double NOT NULL,
    `2T` double NOT NULL,
    `3T` double NOT NULL,
    `Curs` varchar(10) collate utf8_spanish_ci NOT NULL,
    `Observacions` varchar(1500) collate utf8_spanish_ci NOT NULL,
    PRIMARY KEY  (`ID`),
    FOREIGN KEY (ID_Assignatura) REFERENCES Assignatures(ID),
    FOREIGN KEY (ID_Alumne) REFERENCES Alumnes(ID)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Escoles 2.0</title>
  <link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var url = "http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=d51a852e16430fb26b78b3435cb48df0&tags=delta+del+ebre&safe_search=1&format=json&per_page=50&jsoncallback=?";
      var src;
      var id = random = Math.ceil(Math.random() * 50) + 1;
      $.getJSON(url, function(data){
              src = "http://farm"+ data.photos.photo[id].farm +".static.flickr.com/"+ data.photos.photo[id].server +"/"+ data.photos.photo[id].id +"_"+ data.photos.photo[id].secret +"_c.jpg";
              $("<img/>").attr("src", src).appendTo("#fullscreen_bg");
              if ( i == 3 ) return false;
      });
    });
  </script>
    <style>
      body {
        padding-top: 120px;
        padding-bottom: 40px;
        background-color: #eee;

      }
      .btn 
      {
       outline:0;
       border:none;
       border-top:none;
       border-bottom:none;
       border-left:none;
       border-right:none;
       box-shadow:inset 2px -3px rgba(0,0,0,0.15);
       position: relative;
        z-index: 2;
      }
      .btn:focus
      {
        
       outline:0;
       -webkit-outline:0;
       -moz-outline:0;
      }
      .fullscreen_bg img {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat:repeat;
      }
      .form-signin {
        max-width: 280px;
        padding: 15px;
        margin: 0 auto;
          margin-top:50px;
      }
      .form-signin .form-signin-heading, .form-signin {
        margin-bottom: 10px;
      }
      .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: none;
        border-left-style: solid;
        border-color: #000;
        border-top:1px solid rgba(0,0,0,0.08);
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top-style: none;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-color: rgb(0,0,0);
        border-top:1px solid rgba(0,0,0,0.08);
      }
      .form-signin-heading {
        font-family: 'Gafata', sans-serif;
        position: relative;
        color: #fff;
        text-align: center;
        text-shadow: 0 2px 2px rgba(0,0,0,0.5);
        z-index: 2;
      }
      .alert {
          position: relative;
          z-index: 99;
      }
    </style>
  <body>
    <div id="fullscreen_bg" class="fullscreen_bg"></div>
        <div class="container">
            <h1 class="form-signin-heading text-muted strong">Escoles 2.0</h1>            
            <h2>La base de dades s'ha generat correctament</h2>
            <h3>S'aconsella canviar la contrasenya de l'usuari 11111111A</h3>
        </div>
  </body>
</html>
