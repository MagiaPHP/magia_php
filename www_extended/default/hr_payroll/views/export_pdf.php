<?php

include pdf_template("payroll");

$pdf = new PDF_PAYROLL();
$pdf->setPdfPayroll($id);
$pdf->setDocModele(_options_option('doc_model'));
//vardump(_options_option('doc_model')); 
$pdf->setDoc('payroll');
$pdf->setLang($lang);
$pdf->setCell_selected($cell_selected);

//vardump($pdf->getCell_selected()); 
//vardump($pdf);
//vardump($pdf->getLang());
//vardump($lang); 
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords('payroll->exportJson()');
$pdf->SetSubject("Payroll");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->body();

switch ($way) {
    case "pdf":
        $file_64 = ($pdf->Output("S"));
        $pdf->Output("Payroll_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Payroll_$id" . ".pdf", "I");
        break;

    case "email":
        break;

    case "base64":

        //      $doc = $pdf->Output("I", 'file.pdf' );
        $doc = $pdf->Output("d", 'file.pdf');
        $doc = $pdf->Output("F", 'file.pdf');
        $doc = $pdf->Output("S", 'file.pdf');

        break;

    default:
        $pdf->Output("Payroll_$id" . ".pdf", "I");

        break;
}



