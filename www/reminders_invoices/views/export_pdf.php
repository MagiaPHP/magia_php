<?php

# MagiaPHP 
# file date creation: 2024-02-07 
?>
<?php

require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("L");
$pdf->SetFont("Arial", "B", 16);
$pdf->Cell(40, 10, "reminders_invoices !");
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(40, 10, "Edit file: reminders_invoices/views/export_pdf.php !");
$pdf->Output();
