<?php
require_once '../library/fpdf.php';
		$pdf = new FPDF();
		$pdf->AddPage();
//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(2);
$pdf->Cell(30, 6, 'Complaint', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Date', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Text', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Polar words', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Source', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);
$pdf->Output();
exit;		
?>		