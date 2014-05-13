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
      if ($bd->query("INSERT INTO Matricules (IDAlumne,IDAssignatura,Curs) VALUES ($this->idalumne,$this->idassignatura,$this->curs)")) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

}