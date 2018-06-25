<?php
//define('FPDF_FONTPATH', 'font/');
include 'connectdb.php';
//require_once('pdf/code39.php');
require_once('pdf/fpdf.php');


if($con){
	$patient=$_SESSION['patient'];
	$q="select * from result where rid=$patient";
    $result=mysqli_query($con,$q);
    $avail=mysqli_num_rows($result);

    if($avail==0){
    	header('location:noreport.php');
    }

    $w="select * from patient where regid=$patient";
    $main=mysqli_query($con,$w);
    $details=mysqli_fetch_array($main);
    // $testerid=$details['tester'];
    // $e="select * from employee where emp_code=$testerid";
    // $about_tester=mysqli_query($con,$e);
    // $user=mysqli_fetch_array($about_tester);
}
else{
	header('location:nodatabase.php');
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

	function ChapterBody($txt)
	{
		// Times 12
		$this->SetFont('Times','',12);
		// Output justified text
		$this->MultiCell(0,5,$txt);
		// Line break
		$this->Ln();
		$this->Ln();
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
while($row=mysqli_fetch_array($result)){
	$pdf->AddPage();
	$pdf->SetFont('Times','BI',18);
	$pdf->Cell(0,14,'Test Report',0,1,"C");
	$pdf->SetFont('Times','B',10);
	$pdf->Cell(40,10,'Reg No.  '.$details['regid'],0,1,"L");
	$pdf->SetFont('Times','',10);
	$pdf->Cell(80,6,'Name: '.$details['name'],0,0,"L");
	$pdf->Cell(100,6,'Date: '.$details['regdate'],0,1,"R");
	$pdf->Cell(40,6,'Age: '.$details['age'].' Years',0,0,"L");
	$pdf->Cell(40,6,'Sex: '.$details['sex'],0,1,"L");
	$pdf->Cell(80,6,'Mobile No. +91 '.$details['mobile'],0,1,"L");
	$pdf->Cell(120,6,'Hospital: '.strtoupper($details['hospital']),0,1,"L");
	// $pdf->SetFont('Times','B',10);
	// $pdf->Cell(120,6,'Tested By: '.$user['name'],0,1,"L");
	$pdf->SetFont('Times','B',15);
	$pdf->Cell(0,17,$row['tname'],0,1,"C");
	$pdf->ChapterBody($row['report']);
	// $pdf->MultiCell(0,5,$row['report']);
}
$pdf->Output();
?>