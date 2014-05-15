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
    private $idassignatura;
    private $idcurs;
    private $data;
    
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
    
    
    function insertanotacio(){
        
        require_once('connexio.php');
					
	$bd = new connexio();
        
	$bd->query('INSERT INTO Anotacions (ID_Assignatura,ID_Professor,ID_Alumne,Anotacio,IDCurs,Data) VALUES 
        ("'.$this->getIDAssignatura().'","'.$this->getIDProfessor().'","'.$this->getIDAlumne().'","'.$this->getAnotacio().'","'.$this->getIDCurs().'","'.$this->getData().'")');
       
        header("Location:indexprofessor.php?correcte");
   
    $bd->close(); 
        
    }
    
    function mostraranotacions() {
        
        require_once('connexio.php');
					
	$bd = new connexio();
        
        $result = $bd->query("SELECT * FROM Anotacions");
        
        while ($file = $result->fetch_array(MYSQLI_ASSOC)) {
        
        ?>
            <tr>
                <td></td><td></td>
            </tr>
        <?php    
        }
        
        $bd->close();
        
        
    }
    
}
