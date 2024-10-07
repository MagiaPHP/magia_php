<?php

/*
include view("doc_models", "invoice");

// Instanciation de la classe dérivée
$pdf = new INVOICE();

$pdf->SetTitle("Coello.be") ;
$pdf->SetAuthor("Robinson Coello <info@coello.be>") ;
$pdf->SetCreator("Coello.be") ;
$pdf->SetKeywords("Coello.be") ;
$pdf->SetSubject("Invoice") ;


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->doc_title(_tr("Invoice") . " " .  invoices_pdf_formated_id($id)); 
$pdf->body($invoices, $addresses_billing, $addresses_delivery); 
$pdf->AddPage(); 
$pdf->virement(); 

switch ( $way ) {
    case "pdf":
        $pdf->Output("Invoice_$id" . ".pdf" , "D") ;
        break ;

    case "web":
        $pdf->Output("Invoice_$id" . ".pdf" , "I") ;
        break ;

    case "email":
        
        $email_Subject = "$config_company_name Invoice" ;
        //$email_reciver = "robin@web.com" ;
        //$email_reciver = $reciver_email ;
        //$email_reciver_name = " $reciver_name $reciver_lastname " ;
        $email_Body = $message ;
        $email_AltBody = '$email_AltBody' ;
        include controller("emails", "send_email_file");
        break ;


    default:
        $pdf->Output("Invoice_$id" . ".pdf" , "I") ;
        break ;
}




*/
