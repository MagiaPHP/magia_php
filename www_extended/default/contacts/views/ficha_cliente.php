<?php

include pdf_template("contact");

$pdf = new PDF_CONTACT();
$pdf->setPdfContact($id); // tipo de contacto 
// escoje que modelo va a imprimir de los doc_model
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('contact');
$pdf->setLang($lang);
//
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('invoice->exportJson()');
$pdf->SetSubject("Contacts");
$pdf->AliasNbPages();

$pdf->AddPage("L");

$pdf->body();

$pdf->Output("Contact" . ".pdf", "I");

