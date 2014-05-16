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
      $repetit = FALSE;
      $bd = new connexio();
      $data = date("Y",time())."-$mes-01";
      $any = date('Y',strtotime($data));
      $checkexistent = $bd->query("SELECT Data FROM Assentaments GROUP BY Data");
      $numerofiles = $checkexistent->num_rows;
      if ($numerofiles > 0) {
        while ($check = $checkexistent->fetch_array(MYSQLI_ASSOC)) {
          $a = intval(date("Y",strtotime($check['Data'])));
          $m = intval(date("m",strtotime($check['Data'])));
          if ($a == intval($any) && $m == intval($mes)) {
            $repetit = TRUE;
          }
        }
      }
      if (!$repetit) {
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
          if (!$linia->crear()){
            $bd->close();
            return FALSE;
          }
        }
      }
      $bd->close();
      if ($repetit) {
        return FALSE;
      } else {
        return TRUE;
      }
    }
    
    public function facturar() {
      require_once 'connexio.php';
      
      $bd = new connexio();
      $nofacturats = $bd->query("SELECT * FROM Assentaments WHERE Facturat=0");
      $file = $_SERVER['DOCUMENT_ROOT'].'/remeses/'.$data = date("Y-m-d",time()).".txt";
      $arxiu = fopen($file, 'a+');
      while ($linies = $nofacturats->fetch_array(MYSQLI_ASSOC)) {
        $bd->query("UPDATE Assentaments SET Facturat=1 WHERE ID = ".$linies['ID']);
        $alumne = $bd->query("SELECT DNI FROM Alumnes WHERE ID = ".$linies['ID_Alumne']);
        $dni = $alumne->fetch_array(MYSQLI_ASSOC);
        fwrite($arxiu, $dni['DNI']."\t".$linies['Data']."\t".$linies['Concepte']."\t".$linies['Import'].PHP_EOL);
      }
      fclose($arxiu);
      $bd->close();
      if (file_exists($arxiu)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($arxiu));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($arxiu));
        ob_clean();
        flush();
        readfile($arxiu);
      }
      return TRUE;
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
    $consulta = "INSERT INTO Assentaments (ID_Alumne,Concepte,Import,Data,Facturat) VALUES (".$this->getIDAlumne().",'".$this->getConcepte()."',".$this->getImport().",'".$this->getData()."',0)";
    if ($bd->query($consulta)) {
      return TRUE;
    } else {
      return FALSE;
    }
    $bd->close();
  }
}