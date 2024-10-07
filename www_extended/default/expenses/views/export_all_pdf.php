<?php

include pdf_template("export_expenses");

$pdf = new PDF_EXPORT_EXPENSES();
$pdf->setExpenses($expenses);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('export_expenses');
$pdf->setLang($lang);
//
$pdf->setYear($year);
//
if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
    $pdf->setTrimester($m);
} else {
    $pdf->setMonth($m);
}
//
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Invoice");
$pdf->AliasNbPages();

$pdf->AddPage('L');

$pdf->body();

//$pdf->Output("Export_expenses_" . $year . "_" . $m . "_" . ".pdf", "I");
//
switch ($way) {
    case "pdf":
        $pdf->Output("Export_expenses_" . $year . "_" . $m . "_" . ".pdf", "I");
        break;

    case "web":
        $pdf->Output("Invoices" . ".pdf", "I");
        break;

    case "email":
        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Invoices" . ".pdf", "I");
        $pdf->Output("Invoice_$id" . ".pdf", "I");

        break;
}


