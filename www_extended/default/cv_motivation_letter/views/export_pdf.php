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
# Fecha de creacion del documento: 2024-09-18 03:09:44 
#################################################################################
// 
// 
require("includes/fpdf185/fpdf.php");
//require("www_extended/default/cv_motivation_letter/models/Cv_motivation_letter.php");
$pdf = new FPDF();

$cv_motivation_letter = new Cv_ml();
$cv_motivation_letter->setCv_motivation_letter($id);

//vardump($cv_motivation_letter); 


$cv_motivation_letter->generatePDF($m); 


//$pdf->AddPage("P");
//$pdf->SetFont("Arial", "B", 16);
//$pdf->Cell(0, 10, "cv_motivation_letter !", 1, 1, "C");
//$pdf->SetFont("Arial", "B", 12);
//$pdf->Cell(40, 10, "Edit file: cv_motivation_letter/views/export_pdf.php !");
//$pdf->Output();


