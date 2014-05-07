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
    
    
    function __construct() {
        
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

}