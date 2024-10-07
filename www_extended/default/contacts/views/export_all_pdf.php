<?php

include pdf_template("export_contacts");

$pdf = new PDF_EXPORT_CONTACTS();
$pdf->setContacts($contacts); // tipo de contacto 
// escoje que modelo va a imprimir de los doc_model
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('export_contacts');
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

$pdf->Output("Export_contacts" . ".pdf", "I");

//switch ($way) {
//    case "pdf":
//        $pdf->Output("Contacts" . ".pdf", "D");
//        break;
//    case "web":
//        $pdf->Output("Contacts" . ".pdf", "I");
//        break;
//    case "email":
//        $doc = $pdf->Output("S");
//        include controller("emails", "send_email_file");
//        break;
//    default:
//        $pdf->Output("Contacts" . ".pdf", "I");
//        break;
//}


