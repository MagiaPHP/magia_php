<?php

include pdf_template("export_providers");

$pdf = new PDF_EXPORT_PROVIDERS();
$pdf->setProviders($providers); // mandamos la lista 
// escoje que modelo va a imprimir de los doc_model
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('export_providers');
$pdf->setLang($lang);
//
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('providers->exportJson()');
$pdf->SetSubject("Providers");
$pdf->AliasNbPages();

$pdf->AddPage("L");

$pdf->body();

$pdf->Output("Export_providers" . ".pdf", "I");

