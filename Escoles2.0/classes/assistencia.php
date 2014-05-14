<?php

class assistencia{
    
    private $id;
    private $idalumne;
    private $idprofessor;
    private $idassignatura;
    private $data;
    
    function __construct($idalumne,$idprofessor,$idassignatura,$data) {
        $this->idalumne = $idalumne;
        $this->idprofessor = $idprofessor;
        $this->idassignatura = $idassignatura;
        $this->data = $data;
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
    
    public function getIDAssignatura(){
        return $this->idassignatura;
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
    $data = $this->getData();    
    $data2 = substr($data,0,10);
    $sql="SELECT * FROM Assistencia WHERE IDAlumnes = ".$this->getIDAlumne()." AND IDProfessor = ".$this->getIDProfessor()." AND IDAssignatura = ".$this->getIDAssignatura()." AND Data LIKE '$data2%' ";
    $base= $bd->query($sql);
    
    $num = $base->num_rows;
    
    if($num == 0){
        
	$bd->query('INSERT INTO Assistencia (IDAlumnes,IDProfessor,IDAssignatura,Data) VALUES 
        ("'.$this->getIDAlumne().'","'.$this->getIDProfessor().'","'.$this->getIDAssignatura().'","'.$this->getData().'")');
         header("Location:indexprofessor.php?correcte");
    }else{
        
       header("Location:indexprofessor.php?error");
   
    
    }
    $bd->close(); 
    //include_once($_SERVER['DOCUMENT_ROOT']."/indexprofessor.php");
    }
    
    
    function mostraradataassistencia(){
        
        require_once('connexio.php');
        
        $bd = new connexio();
        
        $base = $bd->query("SELECT * FROM Assistencia GROUP BY Data");
        
        while ($row = $base->fetch_object()){
            
            
        ?>

<option value="<?php echo $row->Data; ?>"><?php echo date('d F Y',  strtotime($row->Data)); ?></option>
<?php
        }
        
        $bd->close();
    }
}