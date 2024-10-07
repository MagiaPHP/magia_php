<?php

include pdf_template("export_balance");

$pdf = new PDF_EXPORT_BALANCE();
$pdf->setBalance($balance);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('export_balance');
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
$pdf->SetSubject("Export Balance");
$pdf->AliasNbPages();

$pdf->AddPage('L');

$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("Export_balance_" . $year . "_" . $m . "_" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Export_balance_" . $year . "_" . $m . "_" . ".pdf", "I");
        break;

    case "email":
        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Export_balance_" . $year . "_" . $m . "_" . ".pdf", "I");

        break;
}


