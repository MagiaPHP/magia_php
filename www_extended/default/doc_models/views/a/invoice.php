<?php

include pdf_template("a");

class PDF_INVOICE extends A {

    public $_invoice;

    function setPdfInvoice($id) {
        $this->_invoice = new Invoices();
        $this->_invoice->setInvoice($id);
        $this->setA($this->_invoice->getSender()->getId());
    }

    function getInvoice() {
        return $this->_invoice;
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
    ////////////////////////////////////////////////////////////////////////////
    function items($translate = true, $line = null) {
        global $id;
        global $u_owner_id;

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
        $debug_pdf = _options_option('config_pdf_debug') ?? false;

        if ($debug_pdf) {
            $border = 1;
        }

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $totalitems = 0;
        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $discounts = 0;
        $discounts_mode = 0;
        $totaldiscounts = 0;
        $i = 1;
        ////////////////////////////////////////////////////////////////////////
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        foreach (invoice_lines_list_by_invoice_id($id) as $key => $ii) {

            // php 8
//            $is_separator = (str_contains($ii['description'], '---')) ? 1 : 0;
            // php (PHP 4, PHP 5, PHP 7, PHP 8)
            $is_separator = (strpos($ii['description'], '---')) ? 1 : 0;

            $totalitems = $totalitems + ($ii['quantity'] );
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] );
            $subtotal = $subtotal + $ii['subtotal'];
            $totaltax = $totaltax + $ii['totaltax'];
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]);
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "";

            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            $fill = (isset($cell['fill']) && $cell['fill'] ) ? true : false;

            $color = ( $i % 2 == 0 ) ? $fill : 0;

//            $border = 1; 
            if ($is_separator) {

                $this->Cell(($this->get_Pdf_ancho() / 100) * 75, $this->get_Pdf_alto_linea() * 0.7, $ii['description'], 'B', 1, 'C', 1);
            } else {

                $this->Cell(($this->get_Pdf_ancho() / 100) * 5.25, $this->get_Pdf_alto_linea() * 0.7, $ii['quantity'], $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 38.0, $this->get_Pdf_alto_linea() * 0.7, '', $border, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['price'] * $ii['quantity']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, "$discounts_mode " . moneda($ii['totaldiscounts']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['totaltax']) . " (" . $ii['tax'] . "%) ", $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 9.4, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal'] + $ii['totaltax']), $border, 1, 'R', $color);
// MULTI CELDA
                $this->SetY($this->GetY() - 3.0); // distancia desde arriba
                $this->SetX($this->GetX() + 9.50); // distancia desde el margen izquierdo

                $this->MultiCell(
                        (
                        $this->get_Pdf_ancho() / 100) * 38, // w
                        $this->get_Pdf_alto_linea() * 0.5, // h
                        pdf_textr(($ii['description']) ?? null), // text                    
                        $border, // border
                        'L', // align
                        $color // fill
                );

                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                $i++;
            }

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
        }

        // La ultima linea de los items
        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.15, "", 'T', 1, 'R', 0);

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
//        $this->SetFont('Arial', '', 8);
        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
//        $this->Ln();
        ## TVA     
        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr('Items'), 1, 0, "R", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Discounts", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Base taxable", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("% Tva", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Tva", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $this->getLang()), 1, 1, 'R', 0);

        $total_items_all_tax = null;

        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

        foreach ($tax_by_country as $key => $tax) {

            $total_items_by_tax = invoice_lines_total_items_by_tax($id, $tax['tax']);
            $total_items_all_tax = $total_items_all_tax + $total_items_by_tax;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, invoice_lines_total_items_by_tax($id, $tax['tax']), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($id, $tax['tax'])), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($id, $tax['tax']) - invoice_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[tax] %", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_total_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, $total_items_all_tax, 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
        $this->SetFont('Arial', 'B', 8);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS      
        // Total pago recibidos
        $this->SetFont('Arial', '', 8);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Advance", $this->getLang()), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($this->_invoice->getAdvance()), 'LR', 1, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 0, 1, 'R', 0);

## Total a payer
//        vardump($this->_invoice->getAdvance());
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

        $this->SetFont('Arial', '', 10);

//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_tr("To pay", $this->getLang()), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda($tvac - $this->_invoice->getAdvance()), "RLTB", 1, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, '', 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, '', 0, 1, 'R', 0);

        $this->SetFont('Arial', '', 6);
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function itemsxxxx($translate = true, $line = null) {
        global $id;
        global $u_owner_id;

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
        $debug_pdf = _options_option('config_pdf_debug') ?? false;

        if ($debug_pdf) {
            $border = 1;
        }

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $totalitems = 0;
        $totalprice = 0;
        $subtotal = 0;
        $totaltax = 0;
        $tvac = 0;
        $discounts = 0;
        $discounts_mode = 0;
        $totaldiscounts = 0;
        $i = 1;
        ////////////////////////////////////////////////////////////////////////
        $PageNo = $this->PageNo(); // regresa la pagina actual 
        $newpage = false;

        foreach (invoice_lines_list_by_invoice_id($id) as $key => $ii) {

            // php 8
//            $is_separator = (str_contains($ii['description'], '---')) ? 1 : 0;
            // php (PHP 4, PHP 5, PHP 7, PHP 8)
            $is_separator = (strpos($ii['description'], '---')) ? 1 : 0;

            $totalitems = $totalitems + ($ii['quantity'] );
            $totalprice = $totalprice + ($ii['price'] * $ii['quantity'] );
            $subtotal = $subtotal + $ii['subtotal'];
            $totaltax = $totaltax + $ii['totaltax'];
            $tvac = $tvac + ($ii["subtotal"] + $ii["totaltax"]);
            $totaldiscounts = $totaldiscounts + ($ii["totaldiscounts"]);
            $discounts_mode = ($ii['discounts_mode'] == '%') ? "$ii[discounts]$ii[discounts_mode]" : "";

            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            $fill = (isset($cell['fill']) && $cell['fill'] ) ? true : false;

            $color = ( $i % 2 == 0 ) ? $fill : 0;

//            $border = 1; 
            if ($is_separator) {

                $this->Cell(($this->get_Pdf_ancho() / 100) * 75, $this->get_Pdf_alto_linea() * 0.7, $ii['description'], 'B', 1, 'C', 1);
            } else {

                $this->Cell(($this->get_Pdf_ancho() / 100) * 02.60, $cell['h'], $ii['quantity'], $border, 0, 'L', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 49.39, $cell['h'], '', $border, 0, "R", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['quantity'] * $ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['quantity'] * $ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['quantity'] * $ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['quantity'] * $ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 08.00, $cell['h'], moneda($ii['price'] * $ii['quantity']), $border, 1, 'R', $color);

// MULTI CELDA
                $this->SetY($this->GetY() - 5); // distancia desde arriba
                $this->SetX($this->GetX() + 5); // distancia desde el margen izquierdo

                $this->MultiCell(
                        (
                        $this->get_Pdf_ancho() / 100) * 50, // w
                        $cell['h'], // h
                        pdf_textr(($ii['description']) ?? null), // text                    
                        $border, // border
                        'L', // align
                        $color // fill
                );

                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
                $i++;
            }

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
        $this->Cell(($this->get_Pdf_ancho() / 100) * 100, $this->get_Pdf_alto_linea() * 0.15, "", 'T', 1, 'R', 0);

//        $this->SetFont('Arial', '', 8);
        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
//        $this->Ln();
        ## TVA     
        ## TVA            
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr('Items'), 1, 0, "R", 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Discounts", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Base taxable", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, pdf_tr("% Tva", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Tva", $this->getLang()), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total", $this->getLang()), 1, 1, 'R', 0);

        $total_items_all_tax = null;

        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

        foreach ($tax_by_country as $key => $tax) {

            $total_items_by_tax = invoice_lines_total_items_by_tax($id, $tax['tax']);
            $total_items_all_tax = $total_items_all_tax + $total_items_by_tax;

            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, invoice_lines_total_items_by_tax($id, $tax['tax']), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($id, $tax['tax'])), "L", 0, "R", 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_by_tax($id, $tax['tax']) - invoice_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_sum_lines_discounts_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "$tax[tax] %", "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(invoice_lines_total_by_tax($id, $tax['tax'])), "L", 0, 'R', 0);
            $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", "LR", 1, 'R', 0);
        }


        ## Totales TVA
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, $total_items_all_tax, 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totalprice - $totaldiscounts), 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 1, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($totaltax), 1, 0, 'R', 0);
        $this->SetFont('Arial', 'B', 8);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($tvac), 1, 1, 'R', 0);
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS
        // PAGOS RECIVIDOS      
        // Total pago recibidos
        $this->SetFont('Arial', '', 8);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Advance", $this->getLang()), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda($this->_invoice->getAdvance()), 'LR', 1, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, '', 0, 1, 'R', 0);

## Total a payer
//        vardump($this->_invoice->getAdvance());
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

        $this->SetFont('Arial', '', 10);

//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_tr("To pay", $this->getLang()), 0, 0, 'R', 0);
//        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda($tvac - $this->_invoice->getAdvance()), "RLTB", 1, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, '', 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, '', 0, 1, 'R', 0);

        $this->SetFont('Arial', '', 6);
    }

    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

//        vardump($this);
//        vardump($this->getInvoice());
//        vardump($this->getInvoice()->getId());
//        $this->setTag('%pdf_title%', 'Invoice');
//        $this->setTag('%id%', $this->getInvoice()->getId());
        $this->setTag('%id%', str_pad($this->getInvoice()->getId(), 1, "0", STR_PAD_LEFT));
        $this->setTag('%xid%', str_pad($this->getInvoice()->getId(), 2, "0", STR_PAD_LEFT));
        $this->setTag('%xxid%', str_pad($this->getInvoice()->getId(), 3, "0", STR_PAD_LEFT));
        $this->setTag('%xxxid%', str_pad($this->getInvoice()->getId(), 4, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxid%', str_pad($this->getInvoice()->getId(), 5, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxid%', str_pad($this->getInvoice()->getId(), 6, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxid%', str_pad($this->getInvoice()->getId(), 7, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxid%', str_pad($this->getInvoice()->getId(), 8, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxid%', str_pad($this->getInvoice()->getId(), 9, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxxid%', str_pad($this->getInvoice()->getId(), 10, "0", STR_PAD_LEFT));

        $this->setTag('%budget_id%', $this->getInvoice()->getBudget_id());
        $this->setTag("%credit_note_id%", $this->getInvoice()->getCredit_note_id());
//        $this->setTag("%client_id%", $this->getInvoice()->getClient_id());
        $this->setTag("%title%", $this->getInvoice()->getTitle());
        $this->setTag("%seller_id%", $this->getInvoice()->getSeller_id());

        $this->setTag("%date%", $this->getInvoice()->getDate());
        //$this->setTag("%date_yy%", magia_dates_get_year_from_date($this->getInvoice()->getDate())); // 1993 > 93        
        //$this->setTag("%date_yyyy%", magia_dates_get_year_from_date($this->getInvoice()->getDate())); // 1993 > 1993
        //
        //$this->setTag("%date_m%", $this->getInvoice()->getDate()); // 5 > 5
        //$this->setTag("%date_mm%", $this->getInvoice()->getDate()); // 5 > 05
        //$this->setTag("%date_mmm%", $this->getInvoice()->getDate()); // 5 > May
        //          
        //$this->setTag("%date_d%", $this->getInvoice()->getDate()); // 3 > 3
        //$this->setTag("%date_dd%", $this->getInvoice()->getDate()); // 3 > 03
        //$this->setTag("%date_ddd%", $this->getInvoice()->getDate()); // 3 > Monday (dia segun la fecha completa)
        //
        $this->setTag("%date_registre%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_yy%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_yyyy%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_mm%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_mmm%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_dd%", $this->getInvoice()->getDate_registre());
//        $this->setTag("%date_registre_ddd%", $this->getInvoice()->getDate_registre());

        $this->setTag("%date_expiration%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_yy%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_yyyy%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_mm%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_mmm%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_dd%", $this->getInvoice()->getDate_expiration());
//        $this->setTag("%date_expiration_ddd%", $this->getInvoice()->getDate_expiration());
//            
        // items
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
//        $this->setTag("%totals_items%", $this->getInvoice()->getTotal());
//        $this->setTag("%total%", $this->getInvoice()->getTotal());
//        $this->setTag("%totals_discounts%", $this->getInvoice()->getTotal());
//        $this->setTag("%totals_taxable_base%", $this->getInvoice()->getTotal()); // total - discounts
//        $this->setTag("%totals_vat%", $this->getInvoice()->getTotal()); // total - discounts
//        $this->setTag("%totals_total_general%", $this->getInvoice()->getTotal()); // total - discounts
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $this->setTag("%total%", moneda($this->getInvoice()->getTotal()));
        $this->setTag("%tax%", moneda($this->getInvoice()->getTax()));
        $this->setTag("%total_general%", moneda($this->getInvoice()->getTotal() + $this->getInvoice()->getTax()));
        $this->setTag("%advance%", moneda($this->getInvoice()->getAdvance()));
        $this->setTag("%total_to_pay%", moneda(($this->getInvoice()->getTotal() + $this->getInvoice()->getTax() ) - $this->getInvoice()->getAdvance()));

        //////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        $this->setTag("%comments%", $this->getInvoice()->getComments());

        $this->setTag("%r1%", $this->getInvoice()->getR1());
        $this->setTag("%r2%", $this->getInvoice()->getR2());
        $this->setTag("%r3%", $this->getInvoice()->getR3());

//        $this->setTag("%fc%", $this->getInvoice()->getFc());
//        $this->setTag("%date_update%", $this->getInvoice()->getDate_update());
//        $this->setTag("%days%", $this->getInvoice()->getDays());
        $this->setTag("%ce%", $this->getInvoice()->getCe());
        $this->setTag("%code%", $this->getInvoice()->getCode());
        $this->setTag("%type%", $this->getInvoice()->getType());
        $this->setTag("%status_code%", $this->getInvoice()->getStatus());
        $this->setTag("%status%", invoice_status_by_status($this->getInvoice()->getStatus()));
        ////////////////////////////////////////////////////////////////////
//        $this->setTag('%client_id%', $this->getInvoice()->getClient()->getId());
        $this->setTag('%client_tva%', $this->getInvoice()->getClient()->getTva());
//        $this->setTag("%client_name%", $this->getInvoice()->getClient()->getName());
//        $this->setTag("%client_lastname%", $this->getInvoice()->getClient()->getLastname());
        //////////////////////////////////////////////////////////////////
        //
        ////////////////////////////////////////////////////////////////////
        $this->setTag('%client_id%', $this->getInvoice()->getClient()->getId());
        $this->setTag('%client_owner_id%', contacts_formated_name(contacts_field_id('owner_id', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_type%', contacts_formated_name(contacts_field_id('type', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_title%', contacts_formated_name(contacts_field_id('title', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_name%', contacts_formated_name(contacts_field_id('name', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_lastname%', contacts_formated_lastname(contacts_field_id('lastname', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_birthdate%', contacts_formated_name(contacts_field_id('birthdate', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_vat%', (contacts_field_id('tva', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_billing_method%', (contacts_field_id('billing_method', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_discounts%', (contacts_field_id('discounts', $this->getInvoice()->getClient()->getId())));
        $this->setTag('%client_language%', (contacts_field_id('language', $this->getInvoice()->getClient()->getId())));
//        $this->setTag('%client_order_by%', contacts_formated_name(contacts_field_id('order_by', $this->getInvoice()->getClient()->getId())));
//        $this->setTag('%client_status%', contacts_formated_name(contacts_field_id('status', $this->getInvoice()->getClient()->getId())));
        // en la tabla empleados
//        $this->setTag('%client_owner_ref%', contacts_formated_name(contacts_field_id('status', $this->getInvoice()->getClient()->getId())));
//        $this->setTag('%client_cargo%', contacts_formated_name(contacts_field_id('status', $this->getInvoice()->getClient()->getId())));

        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%client_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getInvoice()->getClient()->getId(), $mdnl['name']));
            }
        }
        ////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $ab = (array) ($this->getInvoice()->getAddresses_billing());
        //
        $this->setTag("%client_ab_id%", _text(($ab["_id"]) ?? null ));
        $this->setTag("%client_ab_address%", _text(($ab["_address"]) ?? null ));
        $this->setTag('%client_ab_number%', (($ab["_number"])));
        $this->setTag('%client_ab_postcode%', _text(($ab["_postcode"]) ?? null ));
        $this->setTag('%client_ab_barrio%', _text(($ab["_barrio"]) ?? null ));
        $this->setTag('%client_ab_sector%', _text(($ab["sector"]) ?? null ));
        $this->setTag('%client_ab_ref%', _text(($ab["_ref"]) ?? null ));
        $this->setTag('%client_ab_city%', _text(($ab["_city"]) ?? null ));
        $this->setTag('%client_ab_province%', _text(($ab["province"]) ?? null ));
        $this->setTag('%client_ab_region%', _text(($ab["_region"]) ?? null ));
        $this->setTag('%client_ab_country_code%', _text(( ($ab["_country"]) ) ?? null ));
        $this->setTag('%client_ab_country%', _text(( countries_country_by_country_code($ab["_country"]) ) ?? null ));
        //////////////////////////////////////////////////////////////////
        $ad = (array) ($this->getInvoice()->getAddresses_delivery());
        $this->setTag("%client_ad_id%", _text(($ad["_id"]) ?? null ));
        $this->setTag("%client_ad_address%", _text(($ad["_address"]) ?? null ));
        $this->setTag('%client_ad_number%', _text(($ad["_number"]) ?? null ));
        $this->setTag('%client_ad_postcode%', _text(($ad["_postcode"]) ?? null ));
        $this->setTag('%client_ad_barrio%', _text(($ad["_barrio"]) ?? null ));
        $this->setTag('%client_ad_sector%', _text(($ad["sector"]) ?? null ));
        $this->setTag('%client_ad_ref%', _text(($ad["ref"]) ?? null ));
        $this->setTag('%client_ad_city%', _text(($ad["_city"]) ?? null ));
        $this->setTag('%client_ad_province%', _text(($ad["province"]) ?? null ));
        $this->setTag('%client_ad_region%', _text(($ad["_region"]) ?? null ));
        $this->setTag('%client_ad_country_code%', _text(($ad["_country"]) ?? null ));
//        $this->setTag('%client_ad_country%', _text((countries_country_by_country_code($ad["_country"])));
        $this->setTag('%client_ad_country%', _text(( countries_country_by_country_code($ad["_country"]) ) ?? null ));
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
//        vardump($this->_tag); 
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {
            if ($tag && $tmp) {
                $txt_tr = (str_replace($tag, $tmp ?? '', $txt_tr));
            }
        }

        return pdf_textr($txt_tr);
    }
}
