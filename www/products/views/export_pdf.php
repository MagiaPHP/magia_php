<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<?php
require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("P");
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"products !", 1,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(40,10,"Edit file: products/views/export_pdf.php !");
$pdf->Output();
