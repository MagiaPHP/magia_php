<?php

////////////////////////////////////////////////////////////////////////////////
include pdf_template("export_credit_notes");

$pdf = new PDF_EXPORT_CREDIT_NOTES();
$pdf->setCredit_notes($credit_notes);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('export_credit_notes');
//
$pdf->setYear($year);
//
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    $pdf->setTrimester($m);
} else {
    $pdf->setMonth($m);
}

$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Export Credit Notes");
$pdf->AliasNbPages();

$pdf->AddPage('L');

$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("Export_credit_notes_" . $year . "_" . $m . "_" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Export_credit_notes_" . $year . "_" . $m . "_" . ".pdf", "I");
        break;

    case "email":
        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Export_credit_notes" . ".pdf", "I");

        break;
}


