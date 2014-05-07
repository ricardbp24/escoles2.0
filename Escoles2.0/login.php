<?php
  session_start();
  
  include_once 'classes/connexio.php';

  $usuari = filter_input(INPUT_POST, 'usuari');
  $pass = md5(filter_input(INPUT_POST, 'contrassenya'));
  
  $bd = new connexio();
  
  $check = "SELECT * FROM usuaris WHERE dni = $usuari";
  $resultat = $bd->query($check);
  $dades = $resultat->fetch_array(MYSQLI_ASSOC);
  echo $dades['nom'];

