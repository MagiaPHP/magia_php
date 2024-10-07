<?php

//include view("doc_models" , "budget") ;

include pdf_template("budget");

// Instanciation de la classe dérivée
$pdf = new BUDGET();

$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Budget");
// para definir el idioma
$pdf->setLang($lang);
$pdf->setCell_selected($cell_selected);

$pdf->AliasNbPages();
$pdf->AddPage();
// si el modulo audio esta activo, 
// cambiamos de nombre 
//$doc_title = (modules_field_module('status', 'audio'))? _trc("Delivery note", $lang) : _trc("Budget", $lang);
$doc_title = _trc("Proforma invoice", $lang);
//
$pdf->doc_title(($doc_title) . ': ' . $id);
$pdf->addresses($addresses_billing, $addresses_delivery);
$pdf->Ln();
$pdf->body($budget);
$pdf->tax($budget);

switch ($way) {
    case "pdf":
        $pdf->Output("Proforma_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Proforma_$id" . ".pdf", "I");
        break;

    case "email":

        $email_Subject = "$config_company_name Proforma invoice $id";
        $email_Body = $message;
        $email_AltBody = '$email_AltBody';

        // Listo para ser enviado al sistema de correos

        $doc = $pdf->Output('S');

        include controller("emails", "send_email_file");

        break;

    default:
        $pdf->Output("Budget_$id" . ".pdf", "I");
        break;
}
