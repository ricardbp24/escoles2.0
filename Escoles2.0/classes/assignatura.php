<?php
session_start();
/**
 * Classe Assignatura
 *
 * Ricard
 */

class  assignatura{

    private $id;
    private $assignatura;
    private $idprofessor;
    private $horari;
    private $preu;

    function __construct($id) {
        $this->id =$id;
    }

    //Get
    public function getId(){
        return $this->id;
    }

    public function getAssignatura() {
        return $this->assignatura;
    }

    public function getIdProfessor() {
        return $this->idprofessor;
    }

    public function getHorari() {
        return $this->horari;
    }

    public function getPreu() {
        return $this->preu;
    }

    //Set

    public function setAssignatura($assignatura) {
        $this->assignatura = $assignatura;
    }

    public function setIdProfessor($idprofessor) {
        $this->idprofessor = $idprofessor;
    }

    public function setHorari($horari) {
        $this->horari = $horari;
    }

    public function setPreu($preu) {
        $this->preu = $preu;
    }

    function mostrarassignatura(){
        require_once 'connexio.php';
        $bd = new connexio();

        $sql="SELECT * FROM Assignatures WHERE Professor = ".$_SESSION['id'];

        $base = $bd->query($sql);
        while($file = $base->fetch_object()){
            ?>
            <option  value="<?php echo $file->ID;?>"><?php echo utf8_encode($file->Assignatura); ?></option>
            <?php
            }
        $bd->close();
    }

    public function actualitzaAssignatura(){
        require_once 'connexio.php';

        $bd = new connexio();
        print $this->id;
        $sql = "UPDATE Assignatures SET Assignatura='".$this->getAssignatura()."',Professor=".$this->getIdProfessor().",Horari='".$this->getHorari()."',Preu=".$this->getPreu()." WHERE ID=$this->id";
        print $sql;
        if($bd->query($sql)) return true;
        else return false;
        $bd->close();
    }


}

class novaAssignatura extends assignatura {
  function __construct($assignatura,$idprofessor,$horari,$preu) {
    parent::__construct($dni);
    $this->assignatura = $assignatura;
    $this->idprofessor = $idprofessor;
    $this->horari      = $horari;
    $this->preu        = $preu;
  }
  public function insertaAssignatura(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("INSERT INTO Assignatures (Assignatura,Professor,Horari,Preu) VALUES ('$this->assignatura',$this->idprofessor,'$this->horari',$this->preu)");
    if ($bd->query($sql)) {
      return TRUE;
    } else {
      return FALSE;
    }

    $bd->close();
  }
}

