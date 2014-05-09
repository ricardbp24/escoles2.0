<?php

class assistencia{
    
    private $id;
    private $idalumne;
    private $idprofessor;
    private $idassignatura;
    private $data;
    
    function __construct() {
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getIDAlumne(){
        return $this->idalumne;
    }
    
    public function getIDProfessor(){
        return $this->idprofessor;
    }
    
    public function getAssignatura(){
        return $this->assignatura;
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    function insertardata(){
        
        require_once('connexio.php');
					
	$bd = new connexio();
	if ($bd->query('INSERT INTO Assistencia (IDAlumnes,IDProfessor,IDAssignatura,Data) VALUES 
        ('.$this->getIDAlumne().','.$this->getIDProfessor().','.$this->getAssignatura().','.$this->getData().')')){
            header('Location:');
        } else {
                echo "Error: %s\n", $bd->error;
        }
        $bd->close();
        
        
    }
    
    
}