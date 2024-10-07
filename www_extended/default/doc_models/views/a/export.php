<?php

include pdf_template("a");

class PDF_EXPORT extends A {

    public $_data;

    function setPdfExport($data) {
        $this->_data = $data;
//        $this->_invoices = new Balance();
//        $this->_balance->setBalance($id);
        $this->setA(1022);
    }

    function getData() {
        return $this->_data;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {
        $this->addElements("body");
    }

    function Footer() {
        parent::Footer();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function items($translate = true, $line = null) {
        global $id;

        $params = json_decode($line['params'], true);
        $cell = $params['Cell'];

//        vardump($line);
//        vardump($params);
//        vardump($cell);
        ##############################################################
        ##############################################################
        ##############################################################
        $SetFont = $params['SetFont'];
        $SetTextColor = $params['SetTextColor'];
        $SetDrawColor = $params['SetDrawColor'];
        $SetFillColor = $params['SetFillColor'];
        ////////////////////////////////////////////////////////////////////
        if ($SetFont) {
            $format = "";
            foreach ($SetFont['format'] as $key => $f) {
                if ($f == 'R') {
                    $f = "";
                }
                $format = $format . $f;
            }
            $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
        }
        ////////////////////////////////////////////////////////////////////
        if ($SetTextColor) {
            $this->SetTextColor((int) $SetTextColor['r'], (int) $SetTextColor['g'], (int) $SetTextColor['b']);
        }
        if ($SetDrawColor) {
            $this->SetDrawColor((int) $SetDrawColor['r'], (int) $SetDrawColor['g'], (int) $SetDrawColor['b']);
        }
        if ($SetFillColor) {
            $this->SetFillColor((int) $SetFillColor['r'], (int) $SetFillColor['g'], (int) $SetFillColor['b']);
        }
        ##############################################################
        ##############################################################
        ##############################################################
        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $i = 1;
        ////////////////////////////////////////////////////////////////////////
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        foreach ($this->getData() as $key => $value) {

            $id = ($value['id']);
            $date = ($value['date']);
            $client = contacts_formated($value['client_id']);
            $tva = contacts_field_id('tva', $value['client_id']);
            $total = $value["total"];
            $tax = $value["tax"];

            $advance = $value["advance"];
            $solde = moneda($value["total"] - $value["advance"]);
            $r1 = $value["r1"];
            $r2 = $value["r2"];
            $r3 = $value["r3"];
            $canceled = $value["canceled"];
            $canceled_code = $value["canceled_code"];
            $status = $value["status"];

            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            // fill el color o no
            // fill el color o no
//            $color = ( $i % 2 == 0 ) ? $cell['fill'] : 0;
            $color = ( $i % 2 == 0 ) ? 1 : 0;

            $this->Cell(8, 5, $i, $border, 0, 'L', $color);
            $this->Cell(15, 5, 'Document', $border, 0, 'L', $color);
            $this->Cell(15, 5, $id, $border, 0, 'L', $color);
            $this->Cell(15, 5, $date, $border, 0, 'L', $color);
            $this->Cell(50, 5, $client, $border, 0, 'L', $color);
            $this->Cell(20, 5, $tva, $border, 0, 'L', $color);
            $this->Cell(15, 5, $total, $border, 0, 'R', $color);
            $this->Cell(15, 5, $advance, $border, 0, 'R', $color);
            $this->Cell(15, 5, $solde, $border, 0, 'R', $color);
            $this->Cell(15, 5, $r1, $border, 0, 'L', $color);
            $this->Cell(15, 5, $r2, $border, 0, 'L', $color);
            $this->Cell(15, 5, $r3, $border, 0, 'L', $color);
            $this->Cell(10, 5, '', $border, 0, 'L', $color);
            $this->Cell(0, 5, $status, $border, 1, 'L', $color);

//// MULTI CELDA
//            $this->SetY($this->GetY() - 3); // distancia desde arriba
//            $this->SetX($this->GetX() + 22);
//            $this->MultiCell(
//                    ($this->get_Pdf_ancho() / 100) * 35,
//                    $this->get_Pdf_alto_linea() * 0.5,
//                    utf8_decode('Hola'),
//                    0,
//                    $border,
//                    0
//            );
//            $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
            $i++;

            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
            // Verifico si ha cambiado l apagina
//            $PageNo = ( $this->PageNo() != $PageNo ) ? $this->PageNo() : $PageNo;
            if ($PageNo != $this->PageNo()) {
                $newpage = true;
                $PageNo = $this->PageNo();
            }

            if ($newpage) {
//                $this->Cell(50, 10, "Nueva pagina", 1, 1);
                $newpage = false;
            }
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
        }

        // La ultima linea de los items
        $this->Cell(0, 2.3, "", '1', 1, 'R', 0);

        $this->Ln();
    }
}
