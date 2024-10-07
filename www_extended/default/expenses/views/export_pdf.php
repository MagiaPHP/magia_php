<?php

include pdf_template("expense");

$pdf = new PDF_EXPENSE();
$pdf->setPdfExpense($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('expenses');
$pdf->setLang($lang);

$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('expense->exportJson()');
$pdf->SetSubject("Expense");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->body();

switch ($way) {
    case "pdf":
//        $file_64 = ($pdf->Output("S"));
//        // actualizo los comentarios privados 
//        invoices_comments_private_update($id, addslashes($file_64));
//        $pdf->Output("Invoice_$id" . ".pdf", "D");
        break;

    case "web":
//        $pdf->Output("Invoice_$id" . ".pdf", "I");
        break;

    case "email":
//        ##----------------------------------------------------------------------
//        $email_Subject = "$config_company_name Invoice";
//        //$reciver_email = ""; 
//        // $reciver_name $reciver_lastname
//        $email_Body = $message;
//        $email_AltBody = '$email_AltBody';
//        ##----------------------------------------------------------------------
////        $email_reciver = "robin@web.com";
//        $email_reciver = $reciver_email;
//        $email_reciver_name = " $reciver_name $reciver_lastname ";
//
//        include controller("emails", "send_email_file");
//        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
        break;

    case "base64":

        //      $doc = $pdf->Output("I", 'file.pdf' );
//        $doc = $pdf->Output("d", 'file.pdf');
//        $doc = $pdf->Output("F", 'file.pdf');
//        $doc = $pdf->Output("S", 'file.pdf');

        break;

    default:

        $pdf->Output("Expense_$id" . ".pdf", "I");

        break;
}


