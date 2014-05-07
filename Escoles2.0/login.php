<?php
  ob_start();
  session_start();
  
  include_once 'classes/connexio.php';

  $usuari = strtoupper(filter_input(INPUT_POST, 'usuari'));
  $pass = filter_input(INPUT_POST, 'contrassenya');
  
  $bd = new connexio();
  
  $check = "SELECT DNI,Password,Tipus FROM Usuaris WHERE DNI = '$usuari' AND Password = '$pass' LIMIT 1";
  $resultat = $bd->query($check);
  $files = $resultat->num_rows;
  if ($files==1) {
    $dades = $resultat->fetch_array(MYSQLI_ASSOC);
    switch ($dades['Tipus']) {
      case 1:
          header('Location: indexdirector.php');
          break;
      case 2:
          header('Location: indexprofessor.php');
          break;
      case 3:
          header('Location: indexadministratiu.php');
          break;
    }
  } else {
    header('Location: loginerror.php');
  }

  $bd->close();

