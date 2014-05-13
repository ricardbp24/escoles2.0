<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all" />
  
</head>
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
        
    $data2 = substr($data,0,10);
    $sql="SELECT * FROM Assistencia WHERE IDAlumnes = ".$this->getIDAlumne()." AND IDProfessor = ".$this->getIDProfessor()." AND IDAssignatura = ".$this->getIDAssignatura()." AND Data LIKE '$data2%' ";
    $base= $bd->query($sql);
    
    $num = $base->num_rows;
    
    if($num == 0){
        
	$bd->query('INSERT INTO Assistencia (IDAlumnes,IDProfessor,IDAssignatura,Data) VALUES 
        ("'.$this->getIDAlumne().'","'.$this->getIDProfessor().'","'.$this->getIDAssignatura().'","'.$this->getData().'")');
   
    }else{
        $message = "Aquest alumne ja te falta";
        
        ?>
                
                <div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <span><strong>WARNING!!!: </strong> . <a href="#" class="glyphicon glyphicon-remove-sign"></a>.</span>
		</div>

<?php
    
    }
    $bd->close(); 
    //include_once($_SERVER['DOCUMENT_ROOT']."/indexprofessor.php");
    }
}