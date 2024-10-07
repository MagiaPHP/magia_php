<?php

include pdf_template("a");

class PDF_EXPENSE extends A {

    public $_expense;

    function setPdfExpense($id) {
        $this->_expense = new Expense();
        $this->_expense->setExpenses($id);
    }

    function getExpense() {
        return $this->_expense;
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
    function items($translate = true, $line = null) {
        global $id;
        global $u_owner_id;

        $params = json_decode($line['params'], true);
        $cell = $params['Cell'];

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

//        var_dump(expenses_lines_list_by_expense_id($this->getId()));
        if (isset($expense_lines) && is_array($expense_lines) && !empty($expense_lines)) {
            foreach (expenses_lines_list_by_expense_id($this->getExpense()->getId()) as $key => $line) {
                $totalitems = $totalitems + ($line['quantity'] );
                $totalprice = $totalprice + ($line['price'] * $line['quantity'] );
                $subtotal = $subtotal + $line['subtotal'];
                $totaltax = $totaltax + $line['totaltax'];
                $tvac = $tvac + ($line["subtotal"] + $line["totaltax"]);
                $totaldiscounts = $totaldiscounts + ($line["totaldiscounts"]);
                $discounts_mode = ($line['discounts_mode'] == '%') ? "$line[discounts]$line[discounts_mode]" : "";

                // si es una nueva pagina 
                // ponemos en encaezaro
                // fill el color o no
                // fill el color o no
                // fill el color o no
                $color = ( $i % 2 == 0 ) ? $cell['fill'] : 0;

                $this->Cell(($this->get_Pdf_ancho() / 100) * 05, $this->get_Pdf_alto_linea() * 0.7, $line['quantity'], $border, 0, 'L', $color);
//            $this->Cell(($this->get_Pdf_ancho() / 100) * 07, $this->get_Pdf_alto_linea() * 0.7, $line['code'], $border, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 35, $this->get_Pdf_alto_linea() * 0.7, '', $border, 0, "L", $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($line['price']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($line['price'] * $line['quantity']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "$discounts_mode " . moneda($line['totaldiscounts']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($line['subtotal']), $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($line['totaltax']) . " (" . $line['tax'] . "%) ", $border, 0, 'R', $color);
                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($line['subtotal'] + $line['totaltax']), $border, 1, 'R', $color);
// MULTI CELDA
                $this->SetY($this->GetY() - 3); // distancia desde arriba
                $this->SetX($this->GetX() + 9.5); // distancia desde el margen izquierdo
                $this->MultiCell(
                        ($this->get_Pdf_ancho() / 100) * 35,
                        $this->get_Pdf_alto_linea() * 0.5,
                        utf8_decode($line['description']),
                        0,
                        $border,
                        0
                );
                $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell
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


            if (isset($tax['value'])) {
                $total_items_by_tax = invoice_lines_total_items_by_tax($id, $tax['value']);
            } else {
                // Manejo de error o acción alternativa si no existe la clave 'value'
                $total_items_by_tax = 0; // O cualquier valor por defecto que consideres
            }

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
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, pdf_tr("Total Advance", $this->getLang()), 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, moneda(123456789), 'LR', 1, 'R', 0);
        ## Total a payer
//        vardump($this->_invoice->getAdvance());
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 1, "", 0, 0, 'R', 0);

        $this->SetFont('Arial', '', 10);
        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, pdf_tr("To pay", $this->getLang()), 0, 0, 'R', 0);

        $this->Cell(($this->get_Pdf_ancho() / 100) * 15, $this->get_Pdf_alto_linea() * 1.5, moneda(111111), "RLTB", 1, 'R', 0);

        $this->SetFont('Arial', '', 6);

        $this->Ln();
    }

    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

//        vardump($this);
//        vardump($this->getExpense());
//        vardump($this->getExpense()->getId());
//        $this->setTag('%pdf_title%', 'Invoice');
//        $this->setTag('%id%', $this->getExpense()->getId());
        $this->setTag('%id%', str_pad($this->getExpense()->getId(), 1, "0", STR_PAD_LEFT));
        $this->setTag('%xid%', str_pad($this->getExpense()->getId(), 2, "0", STR_PAD_LEFT));
        $this->setTag('%xxid%', str_pad($this->getExpense()->getId(), 3, "0", STR_PAD_LEFT));
        $this->setTag('%xxxid%', str_pad($this->getExpense()->getId(), 4, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxid%', str_pad($this->getExpense()->getId(), 5, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxid%', str_pad($this->getExpense()->getId(), 6, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxid%', str_pad($this->getExpense()->getId(), 7, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxid%', str_pad($this->getExpense()->getId(), 8, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxid%', str_pad($this->getExpense()->getId(), 9, "0", STR_PAD_LEFT));
        $this->setTag('%xxxxxxxxxid%', str_pad($this->getExpense()->getId(), 10, "0", STR_PAD_LEFT));

        $this->setTag('%budget_id%', $this->getExpense()->getBudget_id());
        $this->setTag("%credit_note_id%", $this->getExpense()->getId());
//        $this->setTag("%client_id%", $this->getExpense()->getClient_id());
        $this->setTag("%title%", $this->getExpense()->getTitle());
        $this->setTag("%seller_id%", $this->getExpense()->getSeller_id());

        $this->setTag("%date%", $this->getExpense()->getDate());
        $this->setTag("%date_yy%", magia_dates_get_year_from_date($this->getExpense()->getDate())); // 1993 > 93        
        $this->setTag("%date_yyyy%", magia_dates_get_year_from_date($this->getExpense()->getDate())); // 1993 > 1993
        //
        $this->setTag("%date_m%", $this->getExpense()->getDate()); // 5 > 5
        $this->setTag("%date_mm%", $this->getExpense()->getDate()); // 5 > 05
        $this->setTag("%date_mmm%", $this->getExpense()->getDate()); // 5 > May
        //          
        $this->setTag("%date_d%", $this->getExpense()->getDate()); // 3 > 3
        $this->setTag("%date_dd%", $this->getExpense()->getDate()); // 3 > 03
        $this->setTag("%date_ddd%", $this->getExpense()->getDate()); // 3 > Monday (dia segun la fecha completa)
        //
        $this->setTag("%date_registre%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_yy%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_yyyy%", $this->getExpense()->getDate_registre());

        $this->setTag("%date_registre%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_mm%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_mmm%", $this->getExpense()->getDate_registre());

        $this->setTag("%date_registre%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_dd%", $this->getExpense()->getDate_registre());
        $this->setTag("%date_registre_ddd%", $this->getExpense()->getDate_registre());

        $this->setTag("%date_expiration%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_yy%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_yyyy%", $this->getExpense()->getDeadline());

        $this->setTag("%date_expiration%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_mm%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_mmm%", $this->getExpense()->getDeadline());

        $this->setTag("%date_expiration%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_dd%", $this->getExpense()->getDeadline());
        $this->setTag("%date_expiration_ddd%", $this->getExpense()->getDeadline());
//            
        // items
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $this->setTag("%totals_items%", $this->getExpense()->getTotal());
        $this->setTag("%totals_total%", $this->getExpense()->getTotal());
        $this->setTag("%totals_discounts%", $this->getExpense()->getTotal());
        $this->setTag("%totals_taxable_base%", $this->getExpense()->getTotal()); // total - discounts
//        $this->setTag("%totals_vat%", $this->getExpense()->getTotal()); // total - discounts
//        $this->setTag("%totals_total_general%", $this->getExpense()->getTotal()); // total - discounts
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $this->setTag("%total%", $this->getExpense()->getTotal());
        $this->setTag("%tax%", $this->getExpense()->getTax());
        $this->setTag("%total_general%", moneda($this->getExpense()->getTotal() + $this->getExpense()->getTax()));
        $this->setTag("%advance%", $this->getExpense()->getAdvance());
        // $this->setTag("%balance%", $this->getExpense()->getBalance());
        $this->setTag("%total_to_pay%", moneda(($this->getExpense()->getTotal() + $this->getExpense()->getTax() ) - $this->getExpense()->getAdvance()));

        //////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        $this->setTag("%comments%", $this->getExpense()->getComments());

        $this->setTag("%r1%", $this->getExpense()->getR1());
        $this->setTag("%r2%", $this->getExpense()->getR2());
        $this->setTag("%r3%", $this->getExpense()->getR3());

        $this->setTag("%fc%", $this->getExpense()->getFc());
        $this->setTag("%date_update%", $this->getExpense()->getDate_update());
        $this->setTag("%days%", $this->getExpense()->getDays());
        $this->setTag("%ce%", $this->getExpense()->getCe());
        $this->setTag("%code%", $this->getExpense()->getCode());
        $this->setTag("%type%", $this->getExpense()->getType());
        $this->setTag("%status_code%", $this->getExpense()->getStatus());
        $this->setTag("%status%", invoice_status_by_status($this->getExpense()->getStatus()));
        ////////////////////////////////////////////////////////////////////
//        $this->setTag('%client_id%', $this->getExpense()->getClient()->getId());
//        $this->setTag('%client_tva%', $this->getExpense()->getClient()->getTva());
//        $this->setTag("%client_name%", $this->getExpense()->getClient()->getName());
//        $this->setTag("%client_lastname%", $this->getExpense()->getClient()->getLastname());
        //////////////////////////////////////////////////////////////////
        //
        ////////////////////////////////////////////////////////////////////
//        $this->setTag('%client_id%', $this->getExpense()->getClient()->getId());
//        $this->setTag('%client_owner_id%', contacts_formated_name(contacts_field_id('owner_id', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_type%', contacts_formated_name(contacts_field_id('type', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_title%', contacts_formated_name(contacts_field_id('title', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_name%', contacts_formated_name(contacts_field_id('name', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_lastname%', contacts_formated_lastname(contacts_field_id('lastname', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_birthdate%', contacts_formated_name(contacts_field_id('birthdate', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_vat%', (contacts_field_id('tva', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_billing_method%', (contacts_field_id('billing_method', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_discounts%', (contacts_field_id('discounts', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_language%', (contacts_field_id('language', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_order_by%', contacts_formated_name(contacts_field_id('order_by', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_status%', contacts_formated_name(contacts_field_id('status', $this->getExpense()->getClient()->getId())));
        // en la tabla empleados
//        $this->setTag('%client_owner_ref%', contacts_formated_name(contacts_field_id('status', $this->getExpense()->getClient()->getId())));
//        $this->setTag('%client_cargo%', contacts_formated_name(contacts_field_id('status', $this->getExpense()->getClient()->getId())));
//        foreach (directory_names_list() as $key => $mdnl) {
//            if ($mdnl['name']) {
//                $this->setTag('%client_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getExpense()->getClient()->getId(), $mdnl['name']));
//            }
//        }
        ////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        $ab = (array) ($this->getExpense()->getAddresses_billing());
        //
//        $this->setTag("%client_ab_id%", utf8_decode($ab["_id"]));
//        $this->setTag("%client_ab_address%", utf8_decode($ab["_address"]));
//        $this->setTag('%client_ab_number%', utf8_decode($ab["_number"]));
//        $this->setTag('%client_ab_postcode%', utf8_decode($ab["_postcode"]));
//        $this->setTag('%client_ab_barrio%', utf8_decode($ab["_barrio"]));
//        $this->setTag('%client_ab_sector%', utf8_decode($ab["sector"]));
//        $this->setTag('%client_ab_ref%', utf8_decode($ab["_ref"]));
//        $this->setTag('%client_ab_city%', utf8_decode($ab["_city"]));
//        $this->setTag('%client_ab_province%', utf8_decode($ab["province"]));
//        $this->setTag('%client_ab_region%', utf8_decode($ab["_region"]));
//        $this->setTag('%client_ab_country_code%', utf8_decode($ab["_country"]));
//        $this->setTag('%client_ab_country%', utf8_decode(countries_country_by_country_code($ab["_country"])));
        //////////////////////////////////////////////////////////////////
//        $ad = (array) ($this->getExpense()->getAddresses_delivery());
//        $this->setTag("%client_ad_id%", utf8_decode($ad["_id"]));
//        $this->setTag("%client_ad_address%", utf8_decode($ad["_address"]));
//        $this->setTag('%client_ad_number%', utf8_decode($ad["_number"]));
//        $this->setTag('%client_ad_postcode%', utf8_decode($ad["_postcode"]));
//        $this->setTag('%client_ad_barrio%', utf8_decode($ad["_barrio"]));
//        $this->setTag('%client_ad_sector%', utf8_decode($ad["sector"]));
//        $this->setTag('%client_ad_ref%', utf8_decode($ad["ref"]));
//        $this->setTag('%client_ad_city%', utf8_decode($ad["_city"]));
//        $this->setTag('%client_ad_province%', utf8_decode($ad["province"]));
//        $this->setTag('%client_ad_region%', utf8_decode($ad["_region"]));
//        $this->setTag('%client_ad_country_code%', utf8_decode($ad["_country"]));
//        $this->setTag('%client_ad_country%', utf8_decode(countries_country_by_country_code($ad["_country"])));
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        //
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
