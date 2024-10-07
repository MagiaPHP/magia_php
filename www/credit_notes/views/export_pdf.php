<?php

include pdf_template("credit_notes");

$pdf = new PDF_CREDIT_NOTE();
$pdf->setPdfCredit_note($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('credit_notes');
$pdf->setLang($lang);
//
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Credit note");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("Credit_note_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Credit_note_$id" . ".pdf", "I");
        break;

//    case "email":
//
//        $email_Subject = "$config_company_name Budget";
//        $email_Body = $message;
//        $email_AltBody = '$email_AltBody';
//        include controller("emails", "send_email_file");
//        break;

    default:
        $pdf->Output("Credit_note_$id" . ".pdf", "I");
        break;
}

