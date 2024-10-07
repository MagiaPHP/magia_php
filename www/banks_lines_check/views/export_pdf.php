<?php

# MagiaPHP 
# file date creation: 2024-05-22 
?>
<?php

require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "banks_lines_check !");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(40, 10, "Edit file: banks_lines_check/views/export_pdf.php !");
$pdf->Output();
