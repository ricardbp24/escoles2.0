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
    
    function __construct() {
        
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
        

}

