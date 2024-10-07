<?php

include pdf_template("budget");

$pdf = new PDF_BUDGET();
$pdf->setPdfBudget($id);
$pdf->setDocModele(_options_option('doc_model'));
$pdf->setDoc('budgets');
$pdf->setLang($lang);
$pdf->setCell_selected($cell_selected);
//vardump($lang); 
$pdf->SetTitle("Coello.be");
$pdf->SetAuthor("Robinson Coello <info@coello.be>");
$pdf->SetCreator("Coello.be");
$pdf->SetKeywords("Coello.be");
$pdf->SetSubject("Budget");
$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->body();

switch ($way) {
    case "pdf":
        $pdf->Output("Budget_$id" . ".pdf", "D"); // En PDF
        break;

//    case "email": // se envia por email
//        $email_Subject = "$config_company_name Budget $id";
//        $email_Body = $message;
//        $email_AltBody = '$email_AltBody';
//        // Listo para ser enviado al sistema de correos
//        $doc = $pdf->Output('S');
//        include controller("emails", "send_email_file");
//        break;
    case "web":
        $pdf->Output("Budget_$id" . ".pdf", "I"); // visible en la web
        break;

    default:
        $pdf->Output("Budget_$id" . ".pdf", "I"); // Visible en la web
        break;
}
