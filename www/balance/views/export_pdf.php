<?php

include pdf_template("balance");

$pdf = new PDF_BALANCE("P", "mm", "A4");
$pdf->setBalance($balance);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('balance');
//
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Balance");
$pdf->AliasNbPages();

$pdf->AddPage('P');

$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("balance" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("balance" . ".pdf", "I");
        break;

    case "email":
        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("balance" . ".pdf", "I");

        break;
}


