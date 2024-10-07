<?php

# MagiaPHP 
# file date creation: 2024-04-02 
?>
<?php

require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "projects_inout !");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(40, 10, "Edit file: projects_inout/views/export_pdf.php !");
$pdf->Output();
