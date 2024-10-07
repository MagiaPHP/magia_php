<?php

include pdf_template('export');

foreach ($invoices as $invoice) {
    $pdf = new EXPORT();
    $pdf->AddPage("P");
    $pdf->Output();
}










//$pdf = new EXPORT();

//$pdf->AddPage("P");

//$pdf->SetFont("Arial","B",16);
//$pdf->Cell(100, 10, _trc("Invoices"), 0, 1);
//$pdf->SetFont("Arial","B",10);
//
//if($m == 't1' || $m == 't2' || $m == 't3' || $m == 't4'){
//   $pdf->Cell(40,10,_trc("Year") . ": $year - ". _trc("Trimester").": ". strtoupper($m), 0, 1); 
//}else{
//   $pdf->Cell(40,10,_trc("Year") . ": $year - ". _trc("Month").": " . _tr(magia_dates_month($m)), 0, 1); 
//}


//$pdf->body_invoices($invoices);

//$pdf->Output();
