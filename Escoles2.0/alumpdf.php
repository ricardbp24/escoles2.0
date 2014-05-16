<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$alumne = $_REQUEST['a'];

require_once 'classes/tfpdf.php';
require_once 'classes/connexio.php';
require_once 'classes/usuari.php';

class PDF extends TFPDF
{
function Header()
{
    $this->SetFont('DejaVu','',25);
    $this->SetFillColor(24,188,156);
    //$this->Cell(1);
    $this->SetTextColor(255,255,255);
    $this->Cell(0,15,'Escoles 2.0',0,0,'C',true);
    $this->Ln(20);
}
function Taula($cap, $dades)
{
    $w = array(45, 45, 45, 45);
    $this->SetFillColor(24,188,156);
    // Cabeceras
    $this->SetTextColor(255,255,255);
    for($i=0;$i<count($cap);$i++)
        $this->Cell($w[$i],7,$cap[$i],1,0,'C',true);
    $this->Ln();
    
    $this->SetTextColor(0,0,0);
    for($i=0;$i<count($dades);$i++)
        $this->Cell($w[$i],6,$dades[$i],'LR',0,'R');
    $this->Ln();

    $this->Cell(array_sum($w),0,'','T');
}
}

$bd = new connexio();
$dades = $bd->query("SELECT * FROM Alumnes WHERE ID=$alumne");
$alu = $dades->fetch_array(MYSQLI_ASSOC);
$user = new usuari();
$nom = $user->mostrarAlumne($alumne);
$data = date('d-m-Y',strtotime($alu['Data_Naixement']));

$pdf = new PDF();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->AliasNbPages();
$pdf->AddPage();

//Dades personals
$pdf->SetFont('DejaVu','',24);
$pdf->Write(5,"Fitxa d'alumne");
$pdf->Ln(15);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0, 0, 200);
$pdf->Write(5, "Nom Complet: ");
$pdf->Ln();
$pdf->SetFont('DejaVu','',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(5, utf8_encode($nom));
$pdf->Ln(10);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0, 0, 200);
$pdf->Write(5, "DNI: ");
$pdf->Ln();
$pdf->SetFont('DejaVu','',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(5, $alu['DNI']);
$pdf->Ln(10);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0, 0, 200);
$pdf->Write(5, "Data de Naixement: ");
$pdf->Ln();
$pdf->SetFont('DejaVu','',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(5, $data);
$pdf->Ln(10);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0, 0, 200);
$pdf->Write(5, "Telèfons: ");
$pdf->Ln();
$pdf->SetFont('DejaVu','',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(5, $alu['Telefon1']." - ".$alu['Telefon2']);
$pdf->Ln(10);
$pdf->SetFont('DejaVu','',10);
$pdf->SetTextColor(0, 0, 200);
$pdf->Write(5, "Direcció: ");
$pdf->Ln();
$pdf->SetFont('DejaVu','',13);
$pdf->SetTextColor(0, 0, 0);
$pdf->Write(5, utf8_encode($alu['Carrer'])." - ".$alu['Codi_Postal']." ".utf8_encode($alu['Poblacio']));
$pdf->Ln(25);
if ($alu['Foto']!=""){
    $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/fotos/'.$alu['Foto'],150,35,50,50);
}

//Notes
$pdf->SetFont('DejaVu','',18);
$pdf->Write(5,"Notes de l'alumne");
$pdf->Ln(10);
$resumnotes = $bd->query("SELECT * FROM Notes WHERE ID_Alumne=$alumne");
while ($notes = $resumnotes->fetch_array(MYSQLI_ASSOC)){
    $assig = $bd->query("SELECT Assignatura FROM Assignatures WHERE ID=".$notes['ID_Assignatura']);
    $assignatura = $assig->fetch_array(MYSQLI_ASSOC);
    $pdf->SetFont('DejaVu','',12); 
    $pdf->Write(5,"Assignatura: ".utf8_encode($assignatura['Assignatura']));
    $pdf->Ln(5);
    $notesfinals = array($notes['1T'],$notes['2T'],$notes['3T']);
    $cap = array('Primer Trimestre', 'Segon Trimestre', 'Tercer Trimestre');
    $pdf->SetFont('DejaVu','',10);
    $pdf->Taula($cap,$notesfinals);
    $pdf->Ln(10);
}

$pdf->Output();