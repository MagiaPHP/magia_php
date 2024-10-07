<?php

include pdf_template("nde");

//https://www.labelprint.fr/


$pdf = new FPDF('L', 'mm', 'A5');

$items = array(
    $codigo = '1081',
    $fecha = '2022-01-20',
);

foreach ($items as $key => $value) {
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190, 45, 'Code ba barra', 1, 1);
    $pdf->Cell(190, 5, 'JIL00749200000016962', 1, 1, 'C');

    $pdf->Ln();
    // izq
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(95, 5, 'Centro Medico Audio Phone' . $pdf->GetX(), 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, 'Chause de churchil 79', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, '4420 Montegnee', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, 'JIL 07492 ', 1, 1, 'L', 0, false);
    // der

    $pdf->SetY($y);
    $pdf->SetX($x + 95);

    $pdf->Cell(95, 5, 'B-4020', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, '27/02/2022', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, 'Numero de colis 123456', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, 'Expediteur', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, 'Jiho labo', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, 'Rue de grand Bigard 481', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, '1082 Brussels', 1, 2, 'L', 0, false);
    $pdf->Cell(95, 5, 'Belgique', 1, 1, 'L', 0, false);

    $pdf->Cell(95, 5, 'JIL 007492', 1, 1, 'L', 0, false);

    $pdf->Cell(190, 5, 'Print by NigtLink TNT Innight BE ON 13/09/2021 16:32:24 iLJ 003', 1, 0, 'C', 0, false);
}

foreach ($items as $key => $value) {
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190, 45, 'Code ba barra', 1, 1);
    $pdf->Cell(190, 5, 'Texto de codigo de barra' . $key . ' ae ' . $value, 1, 1);
//$pdf->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link)
    $pdf->Cell(190, 5, 'Texto de codigo de barra', 1, 1, 'C', 0, false);
    $pdf->SetFont('Arial', 'B', 25);
    $pdf->Cell(95, 15, 'ReGRESO', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 15, 'B-1082', 1, 1, 'C', 0, false);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 5, 'web SPRL', 1, 0, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 1, 'C', 0, false);
    $pdf->Cell(95, 5, 'Rue de grand bigard 481', 1, 0, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 1, 'C', 0, false);
    $pdf->Cell(95, 5, '1082 Saint Agatha-Berchem', 1, 0, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 1, 'C', 0, false);
    $pdf->Cell(95, 5, '', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 5, 'Expediteur', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 5, 'Centre Med Audio phono', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 5, 'Chausse de churchil 79', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, '', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 5, '4420 Montegne', 1, 1, 'L', 0, false);
    $pdf->Cell(95, 5, '000000', 1, 0, 'C', 0, false);
    $pdf->Cell(95, 5, '', 1, 1, 'L', 0, false);
    $pdf->Cell(190, 5, 'Print by NigtLink TNT Innight BE ON 13/09/2021 16:32:24 iLJ 003', 1, 0, 'C', 0, false);
}





$pdf->Output();

//
//// Instanciation de la classe dérivée
//$pdf = new BUDGET() ;
//
//$pdf->SetTitle("Coello.be") ;
//$pdf->SetAuthor("Robinson Coello <info@coello.be>") ;
//$pdf->SetCreator("Coello.be") ;
//$pdf->SetKeywords("Coello.be") ;
//$pdf->SetSubject("Budget") ;
////
//$pdf->AliasNbPages() ;
////
//$pdf->AddPage() ;
//$pdf->doc_title(_trc("Delivery note", $lang) . ': ' . $budget_id);
//$pdf->addresses($addresses_billing , $addresses_delivery); 
//$pdf->Ln(); 
//
//$pdf->bodyDate($budget); 
//
//if($valued){
//    $pdf->bodyValuedShort($lignes);
//    $pdf->Ln();   
//    $pdf->bodyTransport($lignes_transport);    
//    $pdf->Ln();     
//    //$pdf->tax($budget); 
//    $pdf->tax_short($budget); 
//    //$pdf->pago();
//}else{
//    $pdf->bodyNoValuedShort($lignes); 
//}
//
//
////$pdf->signatures();
//
//switch ( $way ) {
//    case "pdf":
//        $pdf->Output("Budget_$budget_id" . ".pdf" , "D") ;
//        break ;
////    case "web":
////        $pdf->Output("Budget_$budget_id" . ".pdf" , "I") ;
////        break ;
//
//    case "email":                        
//
//        $email_Subject = "$config_company_name Delivery note" ;
//        $email_Body = $message ;
//        $email_AltBody = '$email_AltBody' ;
//        include controller("emails", "send_email_file");        
//        break ;
//
//
//    default:
//        $pdf->Output("Budget_$budget_id" . ".pdf" , "I") ;
//        break ;
//}
//
