<?php

/**
 * Classe Matricules
 * 
 * Ricard
 */

class matricula {
    
    private $id;
    private $idalumne;
    private $idassignatura;
    private $curs;
    
    
    function __construct($al,$as,$c) {
      $this->idalumne = $al;
      $this->idassignatura = $as;
      $this->curs = $c;
    }
    
    //Get
    public function getId() {
        return $this->id;        
    }
    
    public function getIdalumne() {
        return $this->idalumne;        
    }
    
    public function getIdassignatura() {
        return $this->idassignatura;
    }
    
    public function getCurs() {
        return $this->curs;
    }
    
    //Set
    
    public function setCurs($curs) {
        $this->curs = $curs;
    }
    
    public function insertar() {
      require_once 'connexio.php';
      $bd = new connexio;
      $comprovacio = $bd->query("SELECT * FROM Matricules WHERE IDAlumne=$this->idalumne AND IDAssignatura=$this->idassignatura AND Curs=$this->curs");
      $check = $comprovacio->num_rows;
      $alum = $bd->query("SELECT ID,Nom,Cognom1,Cognom2 FROM Alumnes WHERE ID=$this->idalumne");
      $alumne = $alum->fetch_array(MYSQLI_ASSOC);
      $assig = $bd->query("SELECT ID,Assignatura FROM Assignatures WHERE ID=$this->idassignatura");
      $assignatura = $assig->fetch_array(MYSQLI_ASSOC);
      $cu = $bd->query("SELECT ID,Curs FROM Cursos WHERE ID=$this->curs");
      $curs = $cu->fetch_array(MYSQLI_ASSOC);
      if ($check==0) {
        if ($bd->query("INSERT INTO Matricules (IDAlumne,IDAssignatura,Curs) VALUES ($this->idalumne,$this->idassignatura,$this->curs)")) {
          $bd->query("INSERT INTO Notes (ID_Alumne,ID_Assignatura,Curs) VALUES ($this->idalumne,$this->idassignatura,$this->curs)");
          $bd->close();
          $res = 'Alumne <strong><kbd>'.$alumne[Nom].' '.$alumne[Cognom1].' '.$alumne[Cognom2].'</kbd></strong> amb assignatura <strong><kbd>'.$assignatura['Assignatura'].'</kbd></strong> Matriculat correctament<br>';
          return $res;
        } else {
          $bd->close();
          $res = 'Hi ha hagut un error al insertar el alumne <strong><kbd>'.$alumne[Nom].' '.$alumne[Cognom1].' '.$alumne[Cognom2].'</kbd></strong><br>';
          return $res;
        }
      } else {
        $res = 'Alumne <strong><kbd>'.$alumne[Nom].' '.$alumne[Cognom1].' '.$alumne[Cognom2].'</kbd></strong> ja matriculat a la assignatura <strong><kbd>'.$assignatura['Assignatura'].'</kbd></strong> per al curs <strong><kbd>'.$curs['Curs'].'</kbd></strong><br>';
        $bd->close();
        return $res;
      }
    }

}