<?php

$pdf->Ln();

switch ($way) {
    case "pdf":
        $pdf->Output("Credit_note_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Credit_note_$id" . ".pdf", "I");
        break;

    case "email":

        $email_Subject = "$config_company_name Budget";
        $email_Body = $message;
        $email_AltBody = '$email_AltBody';
        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Credit_note_$id" . ".pdf", "I");
        break;
}

