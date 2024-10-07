<?php

// si hay algun mensaje en la pagina de configuracion
if ($home_alert[0]) {

    $j = 1;
    for ($i = 156; $i < date("z"); $i++) {
        $pdf->AddPage();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
//    $pdf->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link)
        $pdf->Cell(300, 10, $home_alert[0] . " " . $j++, 0, '1', 'L', 0, 0);
        $pdf->Cell(300, 10, 'Jose Luis', 0, '1', 'L', 0, 0);
        $pdf->Cell(300, 10, $home_alert[1], 0, '1', 'L', 0, 0);
        $pdf->Cell(300, 10, $home_alert[2], 0, '1', 'L', 0, 0);
    }
}







switch ($way) {
    case "pdf":
        $pdf->Output("Budget_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Budget_$id" . ".pdf", "I");
        break;

    case "email":

        $email_Subject = "$config_company_name Budget $id";
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
