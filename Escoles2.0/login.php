<?php
  ob_start();
  @session_start();
  
  include_once 'classes/connexio.php';

  $usuari = strtoupper(filter_input(INPUT_POST, 'usuari'));
  $pass = filter_input(INPUT_POST, 'contrassenya');
  
  $bd = new connexio();
  
  $check = "SELECT ID,DNI,Password,Tipus FROM Usuaris WHERE DNI = '$usuari' AND Password = '$pass' LIMIT 1";
  $resultat = $bd->query($check);
  $files = $resultat->num_rows;
  if ($files==1) {
    $dades = $resultat->fetch_array(MYSQLI_ASSOC);
    $_SESSION['id'] = $dades['ID'];
    $_SESSION['dni'] = $dades['DNI'];
    $_SESSION['tipus'] = $dades['Tipus'];
    switch ($dades['Tipus']) {
      case 1:
          header('Location: indexdirector.php');
          if (isset($_SESSION['loginerror'])) {
              unset($_SESSION['loginerror']);
          }
          break;
      case 2:
          header('Location: indexprofessor.php');
          if (isset($_SESSION['loginerror'])) {
              unset($_SESSION['loginerror']);
          }
          break;
      case 3:
          header('Location: indexadministratiu.php');
          if (isset($_SESSION['loginerror'])) {
              unset($_SESSION['loginerror']);
          }
          break;
    }
  } else {
    $_SESSION['loginerror']=1;
    header('Location: index.php');
  }

  $bd->close();

