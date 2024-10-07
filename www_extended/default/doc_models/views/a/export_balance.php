<?php

include pdf_template("a");

class PDF_EXPORT_BALANCE extends A {

    public $_balance;
    public $_year;
    public $_trimester;
    public $_month;
    public $_order_by;

    function setBalance($balance) {
        $this->_balance = $balance;
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

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function getBalance() {
        return $this->_balance;
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

    function getOrder_by() {
        return $this->_order_by;
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
        $this->Cell(05, $h, '#', $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr("Id"), $border, $ln, 'R', $color);
        $this->Cell(17, $h, pdf_tr("Date"), $border, $ln, $align, $color);
        $this->Cell(30, $h, pdf_tr("Contact"), $border, $ln, 'L', $color);
        $this->Cell(30, $h, pdf_tr("Reference"), $border, $ln, 'R', $color);
        $this->Cell(32, $h, pdf_tr("ce"), $border, $ln, 'L', $color);
        $this->Cell(65, $h, pdf_tr("Description"), $border, $ln, 'L', $color);
        $this->Cell(05, $h, pdf_tr("T"), $border, $ln, 'C', $color);
        $this->Cell(10, $h, pdf_tr("INV"), $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr("NDC"), $border, $ln, $align, $color);
        $this->Cell(10, $h, pdf_tr("EXP"), $border, $ln, $align, $color);
        $this->Cell(20, $h, pdf_tr("Total"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_tr("Total"), $border, $ln, 'R', $color);
        $this->Cell(00, $h, pdf_tr('CC'), $border, 1, 'R', $color);
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

        (float) $total_positivo = 0;
        (float) $total_negativo = 0;
        (float) $negativo = 0;

        foreach ($this->getBalance() as $key => $inv) {

            $h = ($cell['h']) ? $cell['h'] : 5;
            $ln = ($cell['ln']) ? $cell['ln'] : 0;
            $align = $cell['align'];

            ////////////////////////////////////////////////////////////////////
            (float) $total = (float) $inv['sub_total'] + (float) $inv['tax'];

            if ($total >= 0) {
                $positivo = $total;
                $total_positivo = $total_positivo + $positivo;
            } else {
                $negativo = $total;
                $total_negativo = $total_negativo + ($negativo);
            }


            //////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            // una linea a la vez y a condicion que sedesee llenar
            $color = ( $i % 2 == 0 && $fill ) ? 1 : 0;

            $this->Cell(05, $h, $i, $border, $ln, 'R', $color);
            $this->Cell(10, $h, $inv['id'], $border, $ln, 'R', $color);
            $this->Cell(17, $h, $inv['date'], $border, $ln, $align, $color);
            $this->Cell(30, $h, pdf_textr(contacts_formated($inv['client_id'])), $border, $ln, $align, $color);
            $this->Cell(30, $h, pdf_textr($inv['ref']), $border, $ln, 'R', $color);
            $this->Cell(32, $h, pdf_textr($inv['ce']), $border, $ln, $align, $color);
            $this->Cell(65, $h, pdf_textr($inv['description']), $border, $ln, $align, $color);

            $this->Cell(05, $h, $inv['type'], $border, $ln, 'R', $color);
            $this->Cell(10, $h, $inv['invoice_id'], $border, $ln, 'R', $color);
            $this->Cell(10, $h, $inv['credit_note_id'], $border, $ln, 'R', $color);
            $this->Cell(10, $h, $inv['expense_id'], $border, $ln, 'R', $color);

            $this->Cell(20, $h, ($negativo == 0 ) ? '' : moneda($negativo), $border, $ln, 'R', $color);
            $this->Cell(20, $h, ($positivo == 0 ) ? '' : moneda($positivo), $border, $ln, 'R', $color);

            $this->Cell(00, $h, $inv['canceled_code'], $border, 1, 'R', $color);

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
            $positivo = "";
            $negativo = "";
        }

        // La ultima linea de los items
        $this->Cell(0, 0, "", 'B', 1, 'R', 0);
        $this->Cell(224, $h, "", '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_negativo), 0, 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_positivo), 0, 1, 'R', 0);

        $this->Cell(224, $h, "", 0, 0, 'R', 0);
        $this->Cell(20, $h, '', 0, 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_positivo - abs($total_negativo)), 0, 1, 'R', 0);

//        $this->Ln();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Export Balance');

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
