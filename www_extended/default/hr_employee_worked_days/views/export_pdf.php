<?php

include pdf_template("worked_days");

$pdf = new PDF_WORKED_DAYS();
$pdf->setWorked_days($id);
$pdf->setDocModele(_options_option('doc_model'));
//vardump(_options_option('doc_model')); 
$pdf->setDoc('worked_days');
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
$pdf->SetSubject("worked_days");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->body();

switch ($way) {
    case "pdf":
        $file_64 = ($pdf->Output("S"));
        $pdf->Output("worked_days_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("worked_days_$id" . ".pdf", "I");
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
        $pdf->Output("worked_days_$id" . ".pdf", "I");

        break;
}



