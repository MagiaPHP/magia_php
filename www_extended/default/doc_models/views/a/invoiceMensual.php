<?php

include pdf_template("a");

class InvoiceMensual extends a {

    function body() {

        # 1
        # 1
        # 1
        $this->SetFont('Arial', 'B', 10);
        $resetx = $this->GetX();
        $resetY = $this->GetY();
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Facturado", "B", 1, 'L', 0);
        $this->SetFont('Arial', '', 10);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Empresa ABC", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "TVA: BE123-456-789", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Av de la casa 123", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '1050 - Ixelles', "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Bruxelles - Belgium", "", 1, 'L', 0);

        $this->SetX($resetx + 102 + ($this->get_Pdf_ancho() / 2));
        $this->SetY($resetY);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Enviado a", "B", 1, 'L', 0);
        $this->SetFont('Arial', '', 10);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Empresa ABC", "", 1, 'L', 0);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Luis Alberto Castillo", "", 1, 'L', 0);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Av de la liberte 208", "", 1, 'L', 0);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "1081 - Koekelberg", "", 1, 'L', 0);

        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, '', "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 10) * 5, $this->get_Pdf_alto_linea() * 1, "Bruxelles - Belgium", "", 1, 'L', 0);

        $this->Ln();

        # 777
        # 777
        # 777
        # 777
        $this->SetFont('Arial', 'B', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "Fecha", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "Devis", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "Expira", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "Factura", "", 1, 'R', 0);

        $this->SetFont('Arial', '', 10);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "2020-01-23", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "DE-230", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "2020-02-23", "", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 4, $this->get_Pdf_alto_linea() * 1, "FA-2030", "", 1, 'R', 0);

        $this->Ln();

        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        ## TOTAL DE LA FACTURA
        $this->SetFont('Arial', 'B', 25);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, _tr("Total invoice"), "TB", 0, 'L', 0);
        $this->Cell($this->get_Pdf_ancho() / 2, $this->get_Pdf_alto_linea() * 3, moneda(200), "TB", 1, 'R', 0);

        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(249, 249, 249);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, _tr("Qty"), 0, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 53, $this->get_Pdf_alto_linea() * 1, _tr("Description"), 0, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, _tr("Price"), "0", 0, 'R', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, _tr("Discount"), "0", 0, 'R', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, _tr("HTVA"), "0", 0, 'R', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, _tr("TVA"), "0", 0, 'R', 1);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, _tr("TVAC"), "0", 1, 'R', 1);

        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220, 220, 220);
        $this->SetFont('Arial', '', 10);

        for ($i = 0; $i < 10; $i++) {
            $color = ( $i % 2 == 0 ) ? 1 : 0;
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, "$i" . "999", 0, 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 53, $this->get_Pdf_alto_linea() * 1, "Descripton del xxxxxx " . $this->get_Pdf_ancho(), 0, 0, "L", $color);

            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "100", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "100", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, "21", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, "21", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 7, $this->get_Pdf_alto_linea() * 1, "121", 0, 1, 'R', $color);
        }
        $this->Ln();

        ## TOTALES            
        ## TOTALES            
        ## TOTALES            
        $this->Cell(($this->get_Pdf_ancho() / 4) * 3, $this->get_Pdf_alto_linea() * 1, "TOTAL HTVA", "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 4) * 1, $this->get_Pdf_alto_linea() * 1, "1000 EUR", "", 1, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 4) * 3, $this->get_Pdf_alto_linea() * 1, "TOTAL TVAC", "", 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 4) * 1, $this->get_Pdf_alto_linea() * 1, "1210 EUR", "", 1, 'R', 0);
        $this->Ln();

        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        # CONDICIOES DE PAGO
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "Condiciones y modalidades de pago de esta factura se puedeescribir aca, ya se apara pago en banco o efectivo", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "Pago en xx dias", "", 1, 'L', 0);

        $this->Ln();
        $this->SetFont('Arial', '', 10);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "Pacific bank", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "Accunt numer 123-456-789", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "IBAN 9966", "", 1, 'L', 0);
        $this->Cell(($this->get_Pdf_ancho() / 1) * 1, $this->get_Pdf_alto_linea() * 1, "SWIF 986566658", "", 1, 'L', 0);

        $this->Ln();

        $this->Cell($this->get_Pdf_ancho(), $this->get_Pdf_alto_linea(), "Comunication: +++016/7910/34042+++ ", 1, 0, 'C', 0);

        $this->Ln();

//        if ($pdf_order["express"]) {
//            $this->SetFillColor(248, 243, 43);
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, _tr("EXPRESS"), 1, 0, 'L', 1);
//        } else {
//            $this->Cell($this->get_Pdf_ancho() / 3, $this->get_Pdf_alto_linea() * 1, "99", 1, 0, 'L', 0);
//        }




        $this->Ln();
    }

    function details() {

        # 1
        # 1
        # 1
        $this->SetFont('Arial', 'B', 10);
        $resetx = $this->GetX();
        $resetY = $this->GetY();

        ## ENCABEZADOS DE LOS ITEMS
        ## ENCABEZADOS DE LOS ITEMS
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(249, 249, 249);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3, $this->get_Pdf_alto_linea() * 1, _tr("#"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10, $this->get_Pdf_alto_linea() * 1, _tr("Order"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10, $this->get_Pdf_alto_linea() * 1, _tr("Date"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 8, $this->get_Pdf_alto_linea() * 1, _tr("Ref"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 20, $this->get_Pdf_alto_linea() * 1, _tr("Patient"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3, $this->get_Pdf_alto_linea() * 1, _tr("Qty"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 15, $this->get_Pdf_alto_linea() * 1, _tr("Code"), 1, 0, 'L', 1);
        $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 32, $this->get_Pdf_alto_linea() * 1, _tr("Article"), 1, 1, 'L', 1);

        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        ## ITEMS 
        $this->SetFillColor(220, 220, 220);
        $this->SetFont('Arial', '', 10);

        for ($i = 1; $i < 200; $i++) {
            $color = ( $i % 2 == 0 ) ? 1 : 0;

            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3, $this->get_Pdf_alto_linea() * 1, "$i", 0, 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "987654321", 0, 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "02/01/2020", 0, 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 8, $this->get_Pdf_alto_linea() * 1, "Ref: 012", 0, 0, 'L', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 20, $this->get_Pdf_alto_linea() * 1, "Robinson Coello Sanche", 0, 0, "L", $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 3, $this->get_Pdf_alto_linea() * 1, "99", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "002233445566778899", 0, 0, 'R', $color);
            $this->Cell(($this->get_Pdf_ancho_largo() / 100) * 32, $this->get_Pdf_alto_linea() * 1, "Buchon droite silicon roue oticon event 15, option ", 0, 1, 'L', $color);
        }
        $this->Ln();

        $this->Ln();

        $this->Ln();
    }
}
