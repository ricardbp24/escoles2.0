<?php

/**
 * Classe anotacio
 * 
 */

class anotacio {
    
    private $id;
    private $idprofessor;
    private $idalumne;
    private $anotacio;
    
    
    function __construct() {
        
    }
    
    //Get
    public function getId() {
        return $this->id;
    }
    
    public function getIDProfessor() {
        return $this->idprofessor;
    }
    
    public function getIDAlumne() {
        return $this->idalumne;
    }
    
    
    public function getAnotacio() {
        return $this->anotacio;
    }
    
    //Set
    public function setAnotacio($anotacio) {
        $this->anotacio = $anotacio;
    }
    
}
