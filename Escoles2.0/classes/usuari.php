<?php

/**
 * Description of usuari
 *
 * @author jordi
 */
class usuari {
  private $id;
  private $nom;
  private $cognom1;
  private $cognom2;
  private $data_naixement;
  private $telefon1;
  private $telefon2;
  private $dni;
  private $password;
  private $carrer;
  private $codi_postal;
  private $poblacio;
  private $correu_electronic;
  private $foto;
  private $tipus;
  private $alta;

  function __construct() {

  }

  public function getId() {
    return $this->id;
  }
  public function getNom() {
    return $this->nom;
  }
  public function getCognom1() {
    return $this->cognom1;
  }
  public function getCognom2() {
    return $this->cognom2;
  }
  public function getDatanaixement() {
    return $this->data_naixement;
  }
  public function getTelefon1() {
    return $this->telefon1;
  }
  public function getTelefon2() {
    return $this->telefon2;
  }
  public function getDni() {
    return $this->dni;
  }
  public function getPassword() {
    return $this->password;
  }
  public function getCarrer() {
    return $this->carrer;
  }
  public function getCpostal() {
    return $this->codi_postal;
  }
  public function getPoblacio() {
    return $this->poblacio;
  }
  public function getCelectronic() {
    return $this->correu_electronic;
  }
  public function getFoto() {
    return $this->foto;
  }
  public function getTipus() {
    return $this->tipus;
  }
  public function getAlta() {
    return $this->alta;
  }
  public function setNom($nom) {
    $this->nom = $nom;
  }
  public function setCognom1($cognom) {
    $this->cognom1 = $cognom;
  }
  public function setCognom2($cognom) {
    $this->cognom2 = $cognom;
  }
  public function setDatanaixement($data) {
    $this->data_naixement = $data;
  }
  public function setTelefon1($telf) {
    $this->telefon1 = $telf;
  }
  public function setTelefon2($telf) {
    $this->telefon2 = $telf;
  }
  public function setDni($dni) {
    $this->dni = $dni;
  }
  public function setPassword($pass) {
    $this->password = $pass;
  }
  public function setCarrer($carrer) {
    $this->carrer = $carrer;
  }
  public function setCpostal($cpostal) {
    $this->codi_postal = $cpostal;
  }
  public function setPoblacio($poblacio) {
    $this->poblacio = $poblacio;
  }
  public function setCelectronic($ae) {
    $this->correu_electronic = $ae;
  }
  public function setFoto($foto) {
    $this->foto = $foto;
  }
  public function setTipus($tipus) {
    $this->tipus = $tipus;
  }
  public function setAlta($alta) {
    if ($alta) {
      $this->alta = 1;
    } else {
      $this->alta = 0;
    }
  }

  public function mostrarAlumne($id) {
      $this->id = $id;
      require_once 'connexio.php';
      $bd = new connexio();
      $usuari = $bd->query("SELECT * FROM Alumnes WHERE ID=".$this->getId()." LIMIT 1");
      $nomcomplet = $usuari->fetch_array(MYSQLI_ASSOC);
      return $nomcomplet['Nom'].' '.$nomcomplet['Cognom1'].' '.$nomcomplet['Cognom2'];
  }
}

///////////////////DIRECTOR////////////////////////
class director extends usuari {
  function __construct($dni) {
    parent::__construct();
    $this->dni = $dni;
  }
  public function actualitzarDirector() {
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Foto='".$this->getFoto()."',Password='".$this->getPassword()."',Alta_Baixa='".$this->getAlta()." WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
}

class nouDirector extends director {
  function __construct($dni,$nom,$c1,$c2,$dn,$p,$t1,$t2,$carrer,$cp,$poblacio,$ae,$foto) {
    parent::__construct($dni);
    $this->nom = $nom;
    $this->cognom1 = $c1;
    $this->cognom2 = $c2;
    $this->data_naixement = $dn;
    $this->password = $p;
    $this->telefon1 = $t1;
    $this->telefon2 = $t2;
    $this->carrer = $carrer;
    $this->codi_postal = $cp;
    $this->poblacio = $poblacio;
    $this->correu_electronic = $ae;
    $this->foto = $foto;
    $this->tipus = 1;
    $this->alta = 1;
  }
}

class professor extends usuari {
  function __construct($dni) {
    parent::__construct();
    $this->dni = $dni;
  }

  public function actualitzarProfessor() {
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Foto='".$this->getFoto()."',Password='".$this->getPassword()."',Alta_Baixa='".$this->getAlta()." WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
}

class nouProfessor extends professor {
  function __construct($dni,$nom,$c1,$c2,$dn,$p,$t1,$t2,$carrer,$cp,$poblacio,$ae,$foto) {
    parent::__construct($dni);
    $this->nom = $nom;
    $this->cognom1 = $c1;
    $this->cognom2 = $c2;
    $this->data_naixement = $dn;
    $this->password = $p;
    $this->telefon1 = $t1;
    $this->telefon2 = $t2;
    $this->carrer = $carrer;
    $this->codi_postal = $cp;
    $this->poblacio = $poblacio;
    $this->correu_electronic = $ae;
    $this->foto = $foto;
    $this->tipus = 2;
    $this->alta = 1;
  }
}

class administratiu extends usuari {
  function __construct($dni) {
    parent::__construct();

    $this->dni = $dni;
  }

  public function actualitzarAdministratiuFoto(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Foto='".$this->getFoto()."',Alta_Baixa='".$this->getAlta()."' WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
  public function actualitzarAdministratiuSinFoto(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Alta_Baixa='".$this->getAlta()."' WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
  public function actualitzarAdministratiuFotoIPass(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Foto='".$this->getFoto()."',Password='".$this->getPassword()."',Alta_Baixa='".$this->getAlta()."' WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
  public function actualitzarAdministratiuPass(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Usuaris SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Password='".$this->getPassword()."',Alta_Baixa='".$this->getAlta()."' WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) return TRUE;
    else return FALSE;

    $bd->close();
  }
}

class nouAdministratiu extends administratiu {
  function __construct($nom,$c1,$c2,$dn,$t1,$t2,$dni,$carrer,$cp,$p,$poblacio,$ae,$foto,$tipus) {
    parent::__construct($dni);
    $this->nom               = $nom;
    $this->cognom1           = $c1;
    $this->cognom2           = $c2;
    $this->data_naixement    = $dn;
    $this->password          = $p;
    $this->telefon1          = $t1;
    $this->telefon2          = $t2;
    $this->carrer            = $carrer;
    $this->codi_postal       = $cp;
    $this->poblacio          = $poblacio;
    $this->correu_electronic = $ae;
    $this->foto              = $foto;
    $this->tipus             = 3;
    $this->alta              = 1;
  }
  public function insertarUsuari(){
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("INSERT INTO Usuaris (Nom,Cognom1,Cognom2,Data_Naixement,Telefon1,Telefon2,DNI,Password,Carrer,Codi_Postal,Poblacio,Correu_Electronic,Foto,Tipus,Alta_Baixa) VALUES ('$this->nom','$this->cognom1','$this->cognom2','$this->data_naixement','$this->telefon1','$this->telefon2','$this->dni','$this->password','$this->carrer','$this->codi_postal','$this->poblacio','$this->correu_electronic','$this->foto','$this->tipus','$this->alta')");
    if ($bd->query($sql)) {
      return TRUE;
    } else {
      return FALSE;
    }

    $bd->close();
  }
}
///////////////////DIRECTOR////////////////////////


class alumne extends usuari {
  private $compte_corrent;
  private $persona_contacte;

  function __construct($dni) {
    parent::__construct();
    $this->dni = $dni;
  }

  public function getCCC() {
    return $this->compte_corrent;
  }
  public function getPresonacontacte() {
    return $this->persona_contacte;
  }

  public function setCCC($ccc) {
    $this->compte_corrent = $ccc;
  }
  public function setPresonacontacte($pc) {
    $this->persona_contacte = $pc;
  }

  public function actualitzar() {
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("UPDATE Alumnes SET Nom='".$this->getNom()."',Cognom1='".$this->getCognom1()."',Cognom2='".$this->getCognom2()."',Data_Naixement='".$this->getDatanaixement()."',Telefon1='".$this->getTelefon1()."',Telefon2='".$this->getTelefon2()."',DNI='".$this->dni."',Carrer='".$this->getCarrer()."',Codi_Postal='".$this->getCpostal()."',Poblacio='".$this->getPoblacio()."',Correu_Electronic='".$this->getCelectronic()."',Foto='".$this->getFoto()."',Persona_Contacte='".$this->persona_contacte."',Compte_Corrent='".$this->compte_corrent."',Alta_Baixa=".$this->getAlta()." WHERE DNI='$this->dni'");
    echo $sql;
    if ($bd->query($sql)) {
      return TRUE;
    } else {
      return FALSE;
    }

    $bd->close();
  }
}

class nouAlumne extends alumne {

  function __construct($dni,$nom,$c1,$c2,$dn,$p,$t1,$t2,$carrer,$cp,$poblacio,$ae,$foto,$ccc,$pc) {
    parent::__construct($dni);
    $this->nom = $nom;
    $this->cognom1 = $c1;
    $this->cognom2 = $c2;
    $this->data_naixement = $dn;
    $this->password = $p;
    $this->telefon1 = $t1;
    $this->telefon2 = $t2;
    $this->carrer = $carrer;
    $this->codi_postal = $cp;
    $this->poblacio = $poblacio;
    $this->correu_electronic = $ae;
    $this->foto = $foto;
    $this->compte_corrent = $ccc;
    $this->persona_contacte = $pc;
    $this->alta = 1;
  }

  public function insertar() {
    require_once 'connexio.php';

    $bd = new connexio();
    $sql = ("INSERT INTO Alumnes (Nom,Cognom1,Cognom2,Data_Naixement,Telefon1,Telefon2,DNI,Carrer,Codi_Postal,Poblacio,Correu_Electronic,Foto,Persona_Contacte,Compte_Corrent,Alta_Baixa) VALUES ('$this->nom','$this->cognom1','$this->cognom2','$this->data_naixement','$this->telefon1','$this->telefon2','$this->dni','$this->carrer','$this->codi_postal','$this->poblacio','$this->correu_electronic','$this->foto','$this->persona_contacte','$this->compte_corrent',$this->alta)");
    echo $sql;
    if ($bd->query($sql)) {
      return TRUE;
    } else {
      return FALSE;
    }

    $bd->close();
  }

}