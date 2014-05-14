<?php

/**
 * 
 * Classe Assentament
 * 
 */
date_default_timezone_set('Europe/Spain');

class assentament {
    
    private $id;
    private $idalumne;
    private $concepte;
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
    
    public function getConcepte() {
      return $this->concepte;
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
    public function setID ($id) {
      $this->id = $id;
    }
    
    public function setAlumne ($alumne) {
      $this->idalumne = $alumne;
    }
    
    public function setConcepte($concepte) {
      $this->concepte = $concepte;
    }

    public function setImport($import) {
        $this->import = $import;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function setFacturat($facturat) {
        $this->facturat = $facturat;
    }
    
    public function remesar($mes) {
      require_once 'connexio.php';
      $bd = new connexio();
      $data = date("Y",time())."-$mes-01";
      $cursactual = $bd->query("SELECT ID FROM Cursos ORDER BY ID DESC LIMIT 1");
      $curs = $cursactual->fetch_array(MYSQLI_ASSOC);
      $alumnesmatriculats = $bd->query("SELECT IDAlumne FROM Matricules WHERE Curs=".$curs['ID']." GROUP BY IDAlumne");
      while ($alumnes = $alumnesmatriculats->fetch_array(MYSQLI_ASSOC)) {
        $novalinia = $bd->query("SELECT IDAssignatura FROM Matricules WHERE IDAlumne=".$alumnes['IDAlumne']);
        $import=0;
        $concepte="";
        while ($linia = $novalinia->fetch_array(MYSQLI_ASSOC)) {
          $importassignatura = $bd->query("SELECT Assignatura,Preu FROM Assignatures WHERE ID=".$linia['IDAssignatura']);
          $assignatura = $importassignatura->fetch_array(MYSQLI_ASSOC);
          $import += $assignatura['Preu'];
          $concepte = $concepte."Assignatura: ".$assignatura['Assignatura']."&nbsp;&nbsp;&nbsp;&nbsp;Preu: ".$assignatura['Preu']."<br>";
        }
        $linia = new nouAssentament($alumnes['IDAlumne'],$concepte,$import,$data);
        $linia->crear();
      }
      $bd->close();
    }
}

class nouAssentament extends assentament {
  function __construct($alumne,$concepte,$import,$data) {
    parent::__construct();
    parent::setAlumne($alumne);
    parent::setConcepte($concepte);
    parent::setImport($import);
    parent::setData($data);
    parent::setFacturat(0);
  }
  
  public function crear(){
    require_once 'connexio.php';
    $bd = new connexio();
    /* echo $nomalumne['Nom']." ".$nomalumne['Cognom1']." ".$nomalumne['Cognom2'];
    echo $this->getConcepte()."<br>";
    echo $this->getImport()."<br>";
    var_dump($this->getData())."<br>";
    echo $this->getFacturat()."<br>"; */
    $consulta = "INSERT INTO Assentaments (ID_Alumne,Concepte,Import,Data,Facturat) VALUES (".$this->getIDAlumne().",'".$this->getConcepte()."',".$this->getImport().",'".$this->getData()."',0)";
    echo $consulta;
    $linia = $bd->query($consulta);
    $bd->close();
  }
}