<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
# Documento accesible via la siguiente url:  
# http://localhost/index.php?c=inv_transsactions&a=export_pdf&id=xxx 
// 
// 
require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("P");
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"inv_transsactions !", 1,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(40,10,"Edit file: inv_transsactions/views/export_pdf.php !");
$pdf->Output();
