<?php

include pdf_template("a");

class PDF_EXPORT_EXPENSES extends A {

    public $_expenses;
    public $_year;
    public $_trimester;
    public $_month;

    function setExpenses($expenses) {
        $this->_expenses = $expenses;
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
    function getExpenses() {
        return $this->_expenses;
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
        $this->Cell(10, $h, '#', $border, $ln, 'L', $color);
        $this->Cell(10, $h, _tr("Id"), $border, $ln, $align, $color);
        $this->Cell(20, $h, _tr("Date"), $border, $ln, 'L', $color);
        $this->Cell(50, $h, _tr("Provider"), $border, $ln, 'L', $color);
        $this->Cell(30, $h, _tr("Invoice number"), $border, $ln, 'L', $color);
        $this->Cell(30, $h, _tr("Title"), $border, $ln, 'L', $color);
        $this->Cell(20, $h, _tr("Total"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, _tr("Tva"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, _tr("Tvac"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, _tr("Pay"), $border, $ln, 'R', $color);
        $this->Cell(20, $h, _tr("Solde"), $border, $ln, 'R', $color);
        $this->Cell(00, $h, _tr('Status'), $border, 1, 'R', $color);
        ##############################################################
        ##############################################################
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function items($translate = true, $line = null) {

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
        (float) $total_tva = 0;
        (float) $total_tvac = 0;

        (float) $total_advance = 0;
        (float) $total_solde = 0;

        (float) $negativo = 0;

        foreach ($this->getExpenses() as $key => $inv) {

            $provider = contacts_formated($inv['provider_id']);

            $h = ($cell['h']) ? $cell['h'] : 5;
            $ln = ($cell['ln']) ? $cell['ln'] : 0;
            $align = $cell['align'];
            ////////////////////////////////////////////////////////////////////
            //
            $total = (float) $inv['total'];
            $tva = (float) $inv['tax'];
            $tvac = (float) $inv['total'] + (float) $inv['tax'];
            $advance = (float) $inv['advance'];
            $solde = ($tvac - $advance );
            ////////////////////////////////////////////////////////////////////

            if (
                    $inv['status'] == 10 ||
                    $inv['status'] == 20 ||
                    $inv['status'] == 30
            ) {
                $total_total = $total_total + $total;
                $total_tva = $total_tva + $tva;
                $total_tvac = $total_tvac + $tvac;
                $total_advance = $total_advance + $advance;
                $total_solde = $total_solde + $solde;
            }


            if (
                    $inv['status'] == -10 ||
                    $inv['status'] == -20
            ) {
                $negativo = "-";
            }




            //////////////////////////////////////////////////////////////////////
            // una linea a la vez y a condicion que sedesee llenar
            $color = ( $i % 2 == 0 && $fill ) ? 1 : 0;

            $this->Cell(10, $h, $i, $border, $ln, $align, $color);
            $this->Cell(10, $h, $inv['id'], $border, $ln, $align, $color);
            $this->Cell(20, $h, $inv['date'], $border, $ln, $align, $color);
            $this->Cell(50, $h, $provider, $border, $ln, $align, $color);
            $this->Cell(30, $h, $inv['invoice_number'], $border, $ln, $align, $color);
            $this->Cell(30, $h, $inv['title'], $border, $ln, $align, $color);

            if ($inv['status'] == -10 || $inv['status'] == -20) {
                $this->CellWithStrike(20, $h, moneda($total), $border, $ln, 'R', $color);
                $this->CellWithStrike(20, $h, moneda($tva), $border, $ln, 'R', $color);
                $this->CellWithStrike(20, $h, moneda($tvac), $border, $ln, 'R', $color);
                $this->CellWithStrike(20, $h, moneda($advance), $border, $ln, 'R', $color);
                $this->CellWithStrike(20, $h, moneda($solde), $border, $ln, 'R', $color);
            } else {
                $this->Cell(20, $h, moneda($total), $border, $ln, 'R', $color);
                $this->Cell(20, $h, moneda($tva), $border, $ln, 'R', $color);
                $this->Cell(20, $h, moneda($tvac), $border, $ln, 'R', $color);
                $this->Cell(20, $h, moneda($advance), $border, $ln, 'R', $color);
                $this->Cell(20, $h, moneda($solde), $border, $ln, 'R', $color);
            }

            $this->Cell(00, $h, expenses_status_by_status($inv['status']), $border, 1, 'R', $color);

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
            $total = 0;
            $tva = 0;
            $tvac = 0;
            $advance = 0;
            $solde = 0;
            $negativo = 0;
            ///////////////////////////////////////////////////////////////////
        }

        // La ultima linea de los items
        $this->Cell(0, 0, "", 'B', 1, 'R', 0);
        $this->Cell(150, 0, "", '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_total), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_tva), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_tvac), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_advance), '0', 0, 'R', 0);
        $this->Cell(20, $h, moneda($total_solde), '0', 1, 'R', 0);

        $this->Ln();
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%pdf_title%', 'Export Expenses');

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
