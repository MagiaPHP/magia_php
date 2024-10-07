<?php

switch ($way) {
    case "pdf":
        $pdf->Output("Invoice_$id" . ".pdf", "D");
        break;

    case "web":
        $pdf->Output("Invoice_$id" . ".pdf", "I");
        break;

    case "email":
        $doc = $pdf->Output("S");
        include controller("emails", "send_email_file");
        break;

    default:
        $pdf->Output("Invoice_$id" . ".pdf", "I");
        break;
}


