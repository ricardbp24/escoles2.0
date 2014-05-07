<?php

/**
 * Classe Aula
 * 
 * Ricard
 */

class aula {
    
    private $id;
    private $nomaula;
    private $capacitat;
    private $planta;
    
    function __construct() {
        
    }
    
    //Get
    public function getId() {
        return $this->id;
        
    }
    
    public function getNomaula() {
        return $this->nomaula;
        
    }
    
    public function getCapacitat() {
        return $this->capacitat;
        
    }
    
    public function getPlanta() {
        return $this->planta;
        
    }
    
    //set
    
    public function setNomaula($nomaula) {
        $this->nomaula = $nomaula;
        
    }
    
    public function setCapacitat($capacitat) {
        $this->capacitat = $capacitat;
        
    }
    
    public function setPlanta($planta) {
        $this->planta = $planta;
        
    }
    
}