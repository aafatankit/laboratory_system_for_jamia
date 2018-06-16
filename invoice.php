<?php
include 'connectdb.php';
require('pdf/fpdf.php');

if($con){
	$patient=$_SESSION['printno'];
	$q="select * from patient where regid=$patient";
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result);
    $p="select * from bills where regid=$patient";
    $bill=mysqli_query($con,$p);
    $amt=mysqli_fetch_array($bill);
}
else{
	echo "database is not connected";
}


class PDF extends FPDF{
// Page header
	function Header(){
		// Logo
		$this->Image('images/logo.png',10,6,30);
		// Arial bold 15
		$this->SetFont('Arial','BI',40);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(55,20,'JAMIA LABORATORY',0,0,'C');
		// Line break
		$this->Ln(40);
	}

// Page footer
	function Footer(){
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','BI',18);
$pdf->Cell(0,14,'Receipt Copy',0,1,"C");
$pdf->SetFont('Times','B',10);
$pdf->Cell(40,10,'Reg No.  '.$row['regid'],0,0,"L");
$pdf->SetFont('Times','',10);
//$bnum=$row['regid'];
// $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
// $barcode=$generator->getBarcode($bnum, $generator::TYPE_CODE_128);
$pdf->Cell(130,10,'$barcode',0,1,"R");
$pdf->Cell(80,6,'Name: '.$row['name'],0,0,"L");
$pdf->Cell(100,6,'Date: '.$row['regdate'],0,1,"R");
$pdf->Cell(40,6,'Age: '.$row['age'].' Years',0,0,"L");
$pdf->Cell(40,6,'Sex: '.$row['sex'],0,1,"L");
$pdf->Cell(80,6,'Mobile No. +91 '.$row['mobile'],0,1,"L");
$pdf->Cell(120,6,'Hospital: '.strtoupper($row['hospital']),0,1,"L");
$pdf->Ln(10);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,6,'#',1,0,"C");
$pdf->Cell(130,6,'Test Name',1,0,"C");
$pdf->Cell(45,6,'Amount',1,1,"C");
$pdf->SetFont('Times','',10);
$i=1;
do{
	$pdf->Cell(15,6,$i,1,0,"C");
	$pdf->Cell(130,6,'  '.$row['testname'],1,0,"L");
	$pdf->Cell(45,6,$row['amount'],1,1,"C");
	$i++;
}while($row=mysqli_fetch_array($result));
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,6,'*',1,0,"C");
$pdf->Cell(130,6,'Total',1,0,"C");
$pdf->Cell(45,6,$amt['total'].'/-',1,1,"C");
$pdf->Ln(10);
if($amt['balance']==0){
	$pdf->Cell(28,6,'Payment Status:',0,0,"L");
	$pdf->Cell(28,6,'PAID',0,0,"L");
}
else{
	$pdf->Cell(28,6,'Payment Status:',0,1,"L");
	$pdf->Cell(30,6,'Paid: '.$amt['paid'].'/-',0,0,"L");
	$pdf->Cell(35,6,'Balance: '.$amt['balance'].'/-',0,0,"L");
}

$pdf->Output();
?>