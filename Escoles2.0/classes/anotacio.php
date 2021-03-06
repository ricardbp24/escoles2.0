<?php
/**
 * Classe anotació
 * @author Grup1
 * @version 0.1
 */

class anotacio {
    
    private $id;
    private $idprofessor;
    private $idalumne;
    private $anotacio;
    private $idassignatura;
    private $idcurs;
    private $data;
    
    /**
     * Constructor de la classe anotació
     * @param Int $idassignatura
     * @param Int $idprofessor
     * @param Int $idalumne
     * @param String $anotacio
     * @param Int $idcurs
     * @param Datatime $data
     */
    function __construct($idassignatura,$idprofessor,$idalumne,$anotacio,$idcurs,$data) {
        $this->idassignatura = $idassignatura;
        $this->idalumne = $idalumne;
        $this->idprofessor = $idprofessor;
        $this->idcurs = $idcurs;
        $this->anotacio = $anotacio;
        $this->data = $data;
    }
    
    //Get
    public function getId() {
        return $this->id;
    }
    
    public function getIDAssignatura() {
        return $this->idassignatura;
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
    
    public function getIDCurs() {
        return $this->idcurs;
    }
    
    public function getData() {
        return $this->data;
    }
    
    //Set
    public function setAnotacio($anotacio) {
        $this->anotacio = $anotacio;
    }
    
    /**
     * Funció insertar anotació
     * @param isertaranotacio de l'alumne
     * 
     */
    function insertanotacio(){
        
        //Requeriment de connexió a la BD
        require_once('connexio.php');
        
	//Establir la connexió				
	$bd = new connexio();
        
        //Realitzar un insert el la BD de anotacions
	$bd->query('INSERT INTO Anotacions (ID_Assignatura,ID_Professor,ID_Alumne,Anotacio,IDCurs,Data) VALUES 
        ("'.$this->getIDAssignatura().'","'.$this->getIDProfessor().'","'.$this->getIDAlumne().'","'.$this->getAnotacio().'","'.$this->getIDCurs().'","'.$this->getData().'")');
        
        //Finalment redirecció  qué l'anotació és correcte
        header("Location:indexprofessor.php?pe=3&missatge=anotacio-correcte");
        
        //Tanquem la BD
        $bd->close();   
    } 
}