<?php

include pdf_template("a");

class PDF_REMINDERS2 extends A {

    public $_invoice;

    function setPdfInvoice($id) {
        $this->_invoice = new Invoices();
        $this->_invoice->setInvoice($id);
        $this->setA($this->_invoice->getSender()->getId());
    }

    function getInvoice() {
        return $this->_invoice;
    }

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
        $this->Cell(10, $h, pdf_textr(pdf_tr("Id")), $border, $ln, $align, $color);
        $this->Cell(20, $h, pdf_textr(pdf_tr("Date")), $border, $ln, $align, $color);
        $this->Cell(50, $h, pdf_textr(pdf_tr("Comunication")), $border, $ln, $align, $color);
        $this->Cell(20, $h, pdf_textr(pdf_tr("Total")), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_textr(pdf_tr("Paid")), $border, $ln, 'R', $color);
        $this->Cell(20, $h, pdf_textr(pdf_tr("Solde")), $border, $ln, 'R', $color);
        $this->Cell(00, $h, pdf_textr(pdf_tr('Status')), $border, 1, 'R', $color);
        ##############################################################
        ##############################################################
    }

    function items($translate = true, $line = null) {
        global $invoices;

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

        $total_total = 0;
        $total_advance = 0;

        $i = 1;
        foreach ($invoices as $key => $inv) {

            $total_total = $total_total + $inv['total'] + $inv['tax'];
            $total_advance = $total_advance + $inv['advance'];

            $h = ($cell['h']) ? $cell['h'] : 5;
            $ln = ($cell['ln']) ? $cell['ln'] : 0;
            $align = $cell['align'];
            //
            $color = ( $i % 2 == 0 && $fill ) ? 1 : 0;
            ////////////////////////////////////////////////////////////////////
            $this->Cell(10, $h, $i, $border, $ln, $align, $color);
            $this->Cell(10, $h, $inv['id'], $border, $ln, $align, $color);
            $this->Cell(20, $h, $inv['date'], $border, $ln, $align, $color);
            $this->Cell(50, $h, $inv['ce'], $border, $ln, $align, $color);
            $this->Cell(20, $h, moneda($inv['total'] + $inv['tax']), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda($inv['advance']), $border, $ln, 'R', $color);
            $this->Cell(20, $h, moneda(($inv['total'] + $inv['tax']) - $inv['advance']), $border, $ln, 'R', $color);
            $this->Cell(00, $h, pdf_textr(pdf_tr(invoice_status_by_status($inv['status']))), $border, 1, 'R', $color);
            $i++;
        }

        $this->Cell(0, 0, '', 'T', 1, $align, 0);
        $this->Cell(90, $h, '', 0, $ln, $align, 0);
        $this->Cell(20, $h, moneda($total_total), 0, $ln, 'R', 0);
        $this->Cell(20, $h, moneda($total_advance), 0, $ln, 'R', 0);
        $this->Cell(20, $h, moneda($total_total - $total_advance), 0, $ln, 'R', 0);
        $this->Cell(00, $h, '', 0, $ln, 'R', 0);
    }

    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

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
        $this->setTag("%credit_note_id%", $this->getInvoice()->getId());
        $this->setTag("%client_id%", $this->getInvoice()->getClient_id());
        $this->setTag("%title%", $this->getInvoice()->getTitle());
        $this->setTag("%seller_id%", $this->getInvoice()->getSeller_id());

        $this->setTag("%date%", $this->getInvoice()->getDate());
        $this->setTag("%date_yy%", magia_dates_get_year_from_date($this->getInvoice()->getDate())); // 1993 > 93        
        $this->setTag("%date_yyyy%", magia_dates_get_year_from_date($this->getInvoice()->getDate())); // 1993 > 1993
        //
        $this->setTag("%date_m%", $this->getInvoice()->getDate()); // 5 > 5
        $this->setTag("%date_mm%", $this->getInvoice()->getDate()); // 5 > 05
        $this->setTag("%date_mmm%", $this->getInvoice()->getDate()); // 5 > May
        //          
        $this->setTag("%date_d%", $this->getInvoice()->getDate()); // 3 > 3
        $this->setTag("%date_dd%", $this->getInvoice()->getDate()); // 3 > 03
        $this->setTag("%date_ddd%", $this->getInvoice()->getDate()); // 3 > Monday (dia segun la fecha completa)
        //
        $this->setTag("%date_registre%", $this->getInvoice()->getDate_registre());
        $this->setTag("%date_expiration%", $this->getInvoice()->getDate_expiration());
//            
        $this->setTag("%total%", $this->getInvoice()->getTotal());
        $this->setTag("%tax%", $this->getInvoice()->getTax());
        $this->setTag("%advance%", $this->getInvoice()->getAdvance());
        //
        $this->setTag("%total_to_pay%", moneda(($this->getInvoice()->getTotal() + $this->getInvoice()->getTax() ) - $this->getInvoice()->getAdvance()));

        $this->setTag("%balance%", $this->getInvoice()->getBalance());
        $this->setTag("%comments%", $this->getInvoice()->getComments());
        $this->setTag("%r1%", $this->getInvoice()->getR1());
        $this->setTag("%r2%", $this->getInvoice()->getR2());
        $this->setTag("%r3%", $this->getInvoice()->getR3());
        $this->setTag("%fc%", $this->getInvoice()->getFc());
        $this->setTag("%date_update%", $this->getInvoice()->getDate_update());
        $this->setTag("%days%", $this->getInvoice()->getDays());
        $this->setTag("%ce%", $this->getInvoice()->getCe());
        $this->setTag("%code%", $this->getInvoice()->getCode());
        $this->setTag("%type%", $this->getInvoice()->getType());
        $this->setTag("%status_code%", $this->getInvoice()->getStatus());
        $this->setTag("%status%", invoice_status_by_status($this->getInvoice()->getStatus()));
        ////////////////////////////////////////////////////////////////////
        $this->setTag('%client_id%', $this->getInvoice()->getClient()->getId());
        $this->setTag('%client_tva%', $this->getInvoice()->getClient()->getTva());
        $this->setTag("%client_name%", $this->getInvoice()->getClient()->getName());
        $this->setTag("%client_lastname%", $this->getInvoice()->getClient()->getLastname());
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%client_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getInvoice()->getClient()->getId(), $mdnl['name']));
            }
        }


        /////////////////////////////////////////////////////////////////
//        vardump($this->getInvoice()->getAddresses_billing());
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $ab = (array) ($this->getInvoice()->getAddresses_billing());
        $this->setTag("%client_ab_address%", $ab["_address"]);
        $this->setTag('%client_ab_number%', $ab["_number"]);
        $this->setTag('%client_ab_postcode%', $ab["_postcode"]);
        $this->setTag('%client_ab_barrio%', $ab["_barrio"]);
//        $this->setTag('%client_ab_sector%', $ab["sector"]);
//        $this->setTag('%client_ab_ref%', $ab["_ref"]);
        $this->setTag('%client_ab_city%', $ab["_city"]);
//        $this->setTag('%client_ab_province%', $ab["province"]);
        $this->setTag('%client_ab_region%', $ab["_region"]);
//        $this->setTag('%client_ab_country_code%', $ab["country"]);
        $this->setTag('%client_ab_country%', countries_country_by_country_code($ab["_country"]));
        //////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        $ad = (array) ($this->getInvoice()->getAddresses_billing());
        $this->setTag("%client_ad_address%", $ad["_address"]);
        $this->setTag('%client_ad_number%', $ad["_number"]);
        $this->setTag('%client_ad_postcode%', $ad["_postcode"]);
        $this->setTag('%client_ad_barrio%', $ad["_barrio"]);
//        $this->setTag('%client_ad_sector%', $ad["sector"]);
//        $this->setTag('%client_ad_ref%', $ad["ref"]);
        $this->setTag('%client_ad_city%', $ad["_city"]);
//        $this->setTag('%client_ad_province%', $ad["province"]);
        $this->setTag('%client_ad_region%', $ad["_region"]);
//        $this->setTag('%client_ad_country_code%', $ad["country"]);
        $this->setTag('%client_ad_country%', countries_country_by_country_code($ad["_country"]));
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
