<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-31 17:08:11 
#################################################################################
// 
// 
require("includes/fpdf185/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage("P");
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,"magia_forms_types !", 1,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(40,10,"Edit file: magia_forms_types/views/export_pdf.php !");
$pdf->Output();
