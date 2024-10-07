<?php

/*
include view("doc_models", "invoice");



    

// Instanciation de la classe dérivée
$pdf = new INVOICE();
$pdf->AliasNbPages();

//$pdf->AddPage();
//$pdf->LettreDate("date"); 
//$pdf->LettreBody("Welcome"); 
//$pdf->LettreSignature("Signature"); 


$pdf->AddPage();
$pdf->doc_title(_tr("Invoice") . " " .  invoices_pdf_formated_id($id)); 

$pdf->bodyNoValued($invoices, $addresses_billing, $addresses_delivery); 

if(budgets_invoices_list_budgets_by_invoice_id($id)){
    $pdf->AddPage("L");
    $pdf->doc_title("Details"); 
    $pdf->details(budgets_invoices_list_budgets_by_invoice_id($id)); 
}

$pdf->Output();
 * 
 */