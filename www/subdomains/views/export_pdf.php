<?php

# MagiaPHP 
# file date creation: 2024-05-15 
?>
<?php

require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "subdomains !");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(40, 10, "Edit file: subdomains/views/export_pdf.php !");
$pdf->Output();
