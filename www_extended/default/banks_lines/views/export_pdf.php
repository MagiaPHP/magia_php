<?php

# MagiaPHP 
# file date creation: 2024-03-18 
?>
<?php

//require("includes/fpdf185/fpdf.php");
require("includes/fpdf185/fpdfz.php");
$pdf = new FPDFZ();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "banks_lines Z !");
$pdf->RotatedText(100, 60, 'Factuz.com !', 90);

$pdf->SetFillColor(192);
$pdf->RoundedRect(60, 80, 68, 46, 5, '13', 'DF');

$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(40, 10, "Edit file: banks_lines/views/export_pdf.php !");
$pdf->Output();
