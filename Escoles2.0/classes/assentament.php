<?php

/**
 * 
 * Classe Assentament
 * 
 */

class assentament {
    
    private $id;
    private $idalumne;
    private $import;
    private $data;
    private $facturat;
    
    function __construct() {
        
    }
    
    //Get
    public function getId() {
        return $this->id;
    }
    
    public function getIDAlumne() {
        return $this->idalumne;
    }
    
    public function getImport() {
        return $this->import;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function getFacturat() {
        return $this->facturat;
    }
    
    //Set
    public function setImport($import) {
        $this->import = $import;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function setFacturat($facturat) {
        $this->facturat = $facturat;
    }
}