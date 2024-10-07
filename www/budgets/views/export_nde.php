<?php

include pdf_template("nde");

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

//
$pdf->AliasNbPages();
//
$pdf->AddPage();
$pdf->doc_title(_trc("Delivery note", $lang) . ': ' . $budget_id);
$pdf->addresses($addresses_billing, $addresses_delivery);
$pdf->Ln();

$pdf->bodyDate($budget);

if ($valued) {
    $pdf->bodyValuedShort($lignes);
    $pdf->Ln();
    $pdf->bodyTransport($lignes_transport);
    $pdf->Ln();
    //$pdf->tax($budget); 
    $pdf->tax_short($budget);
    //$pdf->pago();
} else {
    $pdf->bodyNoValuedShort($lignes);
}

// si hay algun mensaje en la pagina de configuracion
if ($home_alert[0]) {
    $pdf->AddPage();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
//    $pdf->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link)
    $pdf->Cell(300, 10, $home_alert[0], 0, '1', 'L', 0, 0);
    $pdf->Cell(300, 10, 'Jose Luis', 0, '1', 'L', 0, 0);
    $pdf->Cell(300, 10, $home_alert[1], 0, '1', 'L', 0, 0);
    $pdf->Cell(300, 10, $home_alert[2], 0, '1', 'L', 0, 0);
}


//$pdf->signatures();

switch ($way) {
    case "pdf":
        $pdf->Output("Budget_$budget_id" . ".pdf", "D");
        break;
//    case "web":
//        $pdf->Output("Budget_$budget_id" . ".pdf" , "I") ;
//        break ;

    case "email":

        $email_Subject = "$config_company_name Delivery note";
        $email_Body = $message;
        $email_AltBody = '$email_AltBody';
        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Budget_$budget_id" . ".pdf", "I");
        break;
}

