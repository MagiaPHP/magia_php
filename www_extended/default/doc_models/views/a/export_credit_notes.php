<?php

include pdf_template("a");

class PDF_EXPORT_CREDIT_NOTES extends A {

    public $_credit_notes;
    public $_year;
    public $_trimester;
    public $_month;

    function setCredit_notes($credit_notes) {
        $this->_credit_notes = $credit_notes;
    }

    function setYear($y) {
        $this->_year = $y;
    }

    function setTrimester($t) {
        $this->_trimester = $t;
    }

    function setMonth($m) {
        $this->_month = $m;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function getCredit_notes() {
        return $this->_credit_notes;
    }

    function getYear() {
        return $this->_year;
    }

    function getTrimester() {
        return $this->_trimester;
    }

    function getMonth() {
        return $this->_month;
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
    function items_header($translate = true, $line = null) {
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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }
        ////////////////////////////////////////////////////////////////////////
        // Se muestra el conor o no?
        $color = ( $cell['fill'] ) ? 1 : 0;
        // L, C, R aliniamiento
        $align = $cell['align'];
        $h = ($cell['h']) ? $cell['h'] : 5;
        $ln = ($cell['ln']) ? $cell['ln'] : 0;

        ##############################################################
        ##############################################################
        $this->Cell(10, $h, '#', $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr("Id"), $border, $ln, $align, $color);
        $this->Cell(20, $h, pdf_tr("Date"), $border, $ln, $align, $color);
        $this->Cell(60, $h, pdf_tr("Client"), $border, $ln, 'L', $color);
        $this->Cell(20, $h, pdf_tr("Invoice"), $border, $ln, 'L', $color);
        $this->Cell(20, $h, pdf_tr("Total"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_tr("Tva"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_tr("Ttvac"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_tr("Refunded"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_tr("Solde"), $border, $ln, 'R', $color);
        $this->Cell(00, $h, pdf_tr('Status'), $border, 1, 'R', $color);
        ##############################################################
        ##############################################################
    }

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
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $border = 0;
        if (isset($cell['border'])) {
            foreach ($cell['border'] as $key_border => $b) {
                $border = $border . $b;
            }
        }
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $i = 1;
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        $fill = ( $cell['fill'] ) ? 1 : 0;

        (float) $total_total = 0;
        (float) $total_tax = 0;
        (float) $total_ttvac = 0;
        (float) $total_returned = 0;

        foreach ($this->getCredit_notes() as $key => $cre) {

            $h = ($cell['h']) ? $cell['h'] : 5;
            $ln = ($cell['ln']) ? $cell['ln'] : 0;
            $align = $cell['align'];
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            (float) $total = (float) $cre['total'];
            (float) $tax = (float) $cre['tax'];
            (float) $ttvac = (float) $cre['total'] + (float) $cre['tax'];

            (float) $returned = (float) $cre['returned'];
            (float) $solde = $ttvac - $returned;
            ////////////////////////////////////////////////////////////////////
            $total_total = $total_total + $total;
            $total_tax = $total_tax + $tax;
            $total_ttvac = $total_ttvac + $ttvac;
            $total_returned = $total_returned + $returned;
            ////////////////////////////////////////////////////////////////////
            // una linea a la vez y a condicion que sedesee llenar
            $color = ( $i % 2 == 0 && $fill ) ? 1 : 0;

            $this->Cell(10, $h, $i, $border, $ln, $align, $color);
            $this->Cell(10, $h, $cre['id'], $border, $ln, $align, $color);
            $this->Cell(20, $h, $cre['date_registre'], $border, $ln, $align, $color);
            $this->Cell(60, $h, pdf_textr(contacts_formated($cre['client_id'])), $border, $ln, $align, $color);
            $this->Cell(20, $h, ($cre['invoice_id']), $border, $ln, $align, $color);
            $this->Cell(20, $h, moneda($total), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda($tax), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda($ttvac), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda($returned), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda($solde), $border, $ln, 'R', $color);

            $this->Cell(00, $h, pdf_textr(credit_notes_status_by_status($cre['status'])), $border, 1, 'R', $color);

//            $this->Cell(00, 05, '', $border, 1, 'R', $color);

            $i++;
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
            (float) $total = 0;
            (float) $tax = 0;
            (float) $ttvac = 0;
            (float) $returned = 0;
            (float) $solde = 0;
            ///////////////////////////////////////////////////////////////////
        }

        // La ultima linea de los items
        $this->Cell(0, 0, '', 'T', 1, 1, 0);
        $this->Cell(120, $h, "", 0, 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_total), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_tax), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_ttvac), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_returned), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_ttvac - $total_returned), '0', 1, 'R', 0);
        //


        $this->Ln();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Export Credit Notes');

        $this->setTag('%year%', $this->getYear());
        $this->setTag('%trimester%', ($this->getTrimester()));
        $this->setTag('%month%', (magia_dates_month($this->getMonth())));

        $this->setTag('%y%', $this->getYear());
        $this->setTag('%t%', ($this->getTrimester()));
        $this->setTag('%m%', ($this->getMonth()));

        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }

        return pdf_textr($txt_tr);
    }
}
