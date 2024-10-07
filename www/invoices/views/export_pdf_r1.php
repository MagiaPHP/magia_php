<?php

include pdf_template("reminders1");

$pdf = new PDF_REMINDERS1();

$pdf->setPdfInvoice($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('reminders1');
$pdf->setLang($lang);
$pdf->setCell_selected($cell_selected);
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Rappel 1");
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("Invoice_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Invoice_$id" . ".pdf", "I");
        break;

    case "email":
        // solo cuando es email, registro que se ha enviado el rappel
        invoices_add_r1($id);
        // registro tambien en la tabla de reminders        
        $solde = invoices_total_invoice($id) - balance_total_pay_by_invoice($id);
        // cojo el porcentaje de r1
        $reminder_percent = (_options_option('config_invoices_r1')) ? _options_option('config_invoices_r1') : 0;
        // registro el rappel,listo para ser agregado en la proxima factura
        reminders_invoices_add(null, $id, $solde, 'r1', $reminder_percent, null, 0, 0);
        ////////////////////////////////////////////////////////////////////////
//        $email_Subject = "$config_company_name Rappel 1" ;
//        //$email_reciver = "robin@web.com" ;
//        //$email_reciver = $reciver_email ;
//        //$email_reciver_name = " $reciver_name $reciver_lastname " ;
//        $email_Body = $message ;
//        $email_AltBody = '$email_AltBody' ;
//        include controller("emails", "send_email_file"); 

        break;

    default:
        break;
}






