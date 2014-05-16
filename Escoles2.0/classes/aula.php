<?php


class aula{
	private $id;
	private $nom_aula;
	private $capacitat;
	private $planta;

	function __construct($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}
	public function getNomAula(){
		return $this->nom_aula;
	}
	public function getCapacitat(){
		return $this->capacitat;
	}
	public function getPlanta(){
		return $this->planta;
	}

	public function setNomAula($nom_aula){
		$this->nom_aula = $nom_aula;
	}
	public function setCapacitat($capacitat){
		$this->capacitat = $capacitat;
	}
	public function setPlanta($planta){
		$this->planta = $planta;
	}

	public function actualitzaAula(){
		require_once 'connexio.php';

		$bd = new connexio();
		print $this->id;
		$sql = ("UPDATE Aules SET Nom_Aula='".$this->getNomAula()."',Capacitat='".$this->getCapacitat()."',Planta='".$this->getPlanta()."' WHERE ID='$this->id'");
		print $sql;
		if($bd->query($sql)) return true;
		else return false;
		$bd->close();
	}

}

class novaAula{
	function __construct($nom_aula,$capacitat,$planta){
		$this->nom_aula = $nom_aula;
		$this->capacitat = $capacitat;
		$this->planta = $planta;

	}
	public function insertaAula(){
		require_once 'connexio.php';

		$bd = new connexio();
		$sql = ("INSERT INTO Aules (Nom_Aula,Capacitat,Planta) VALUES('$this->nom_aula','$this->capacitat','$this->planta')");
		if($bd->query($sql)) return true;
		else return false;

		$bd->close();

	}
}
