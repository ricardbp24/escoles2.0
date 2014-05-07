<?php

/**
 * Classes Notes
 * 
 * Ricard
 */

class nota {
    
    private $id;
    private $idalumne;
    private $idassignatura;
    private $primertrim;
    private $segontrim;
    private $tercertrim;
    private $observacions;
    
    function __construct() {
        
    }

    //Get
    public function getId() {
        return $this->id;
        
    }
    
    public function getIDAlumne() {
        return $this->idalumne;
        
    }
    
    public function getIDAssignatura() {
        return $this->idassignatura;
        
    }
    
    public function getPrimertrim() {
        return $this->primertrim;
        
    }
    
    public function getSegontrim() {
        return $this->segontrim;
        
    }
    
    public function getTercertrim() {
        return $this->tercertrim;
        
    }
    
    public function getObservacions() {
        return $this->observacions;
        
    }
    
    //Set
    
    public function setPrimertrim($primertrim){
        $this->primertrim = $primertrim;
    
    }
    
    public function setSegontrim($segontrim){
        $this->segontrim = $segontrim;
    
    }
    
    public function setTercertrim($tercertrim){
        $this->tercertrim = $tercertrim;
    
    }
    
    public function setObservacions($observacions){
        $this->observacions = $observacions;
    
    }
    
    
}
