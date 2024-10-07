<?php

include pdf_template("default");

//vardump(_options_option("doc_model")); //== 'a'

$pdf = new PDF_DEFAULT();
//$pdf->setPdfInvoice($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('default');
//$pdf->setLang($lang);

$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('');
$pdf->SetSubject("Default");
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->AddPage();
//vardump($doc_models);
//vardump($model);

$pdf->body();

switch ($way) {
    default:
        $pdf->Output("Invoice_$id" . ".pdf", "I");

        break;
}


