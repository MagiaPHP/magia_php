<?php

include pdf_template("a");

class PDF_PAYROLL extends A {

    public $_payroll;

    function setPdfPayroll($id) {

        $this->_payroll = new Payroll();
        $this->_payroll->setHr_payroll($id);
        $this->setA($this->_payroll->getEmployee_id());
    }

    function getPayroll() {
        return $this->_payroll;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {

        $this->addElements("body");
        //$this->RoundedRect(10, 10, 50, 40, 5, '1234', 'DF');
        //$this->RotatedText(10, 10, 'Este es un texto a defFactuz.com - H2O Rue de la baignoire 1050 Bruxelles BelgiuminFactuz.com - H2O Rue de la baignoire 1050 Bruxelles Belgiumir', 1);
//        $this->_Arc(50, 50, 100, 100, 25, 25);
    }

    function Footer() {
        parent::Footer();
        $this->RotatedText(202.5, 280, 'Powered by www.factuz.com ', 90);
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    function items($translate = true, $line = null) {
        global $id;

        $params = json_decode($line['params'], true);

        $cell = $params['Cell'];

        $translate = ( isset($cell['translate']) && $cell['translate'] ) ? true : false;

        $cell['w'] = (float) $cell['w'];
        $cell['h'] = (float) $cell['h'];
        $cell['ln'] = ($cell['ln'] == 0 || $cell['ln'] == 1 || $cell['ln'] == 2 ) ? $cell['ln'] : null;
        $cell['align'] = ($cell['align'] == 'L' || $cell['align'] == 'C' || $cell['align'] == 'R') ? $cell['align'] : 'L';
        $cell['fill'] = (isset($cell['fill']) && $cell['fill'] != null && $cell['fill'] != 0 ) ? true : false; // true o false
        $cell['link'] = ( isset($cell['link'])) ? $cell['link'] : null;

        $label = $this->template($cell['label'], $translate);

// escondido
        $cell['hidden'] = (isset($cell['hidden'])) ? $cell['hidden'] : 0;
//

        $dash_black = (isset($cell['dash']['black'])) ? $cell['dash']['black'] : false;
        $dash_white = (isset($cell['dash']['white'])) ? $cell['dash']['white'] : false;
//


        if (!$cell['hidden']) {
// ubicamos en la hoja
            if ($cell['x']) {
                $this->setX($cell['x']);
            }
            if ($cell['x'] && $cell['y']) {
// regreso los valores al inicio
                $this->SetXY($cell['x'], $cell['y']);
            }
            ##############################################################
            ##############################################################
            ##############################################################
            $SetFont = $params['SetFont'];
            $SetTextColor = $params['SetTextColor'];
            $SetDrawColor = $params['SetDrawColor'];
            $SetFillColor = $params['SetFillColor'];
//            ////////////////////////////////////////////////////////////////////
//            if ($SetFont) {
//                $format = "";
//                foreach ($SetFont['format'] as $key => $f) {
//                    if ($f == 'R') {
//                        $f = "";
//                    }
//                    $format = $format . $f;
//                }
//                $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
//            }
//            ////////////////////////////////////////////////////////////////////
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
            $debug_number_line = _options_option('config_debug_number_line') ?? false;

            if ($debug_number_line) {
                $label = $line['order_by'] . ' ' . $line['name'];
            }

            if ($debug_pdf) {
                $border = 1;
            }
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
            $i = 1;
            foreach (hr_payroll_lines_search_by('payroll_id', $id) as $key => $payroll_line) {



                $code = $payroll_line['code'] ?? '';
                $days = $payroll_line['days'] ?? 0;
                $value = $payroll_line['value'] ?? 0;

                ////////////////////////////////////////////////////////////////////
                if ($code == '7050' || $code == '7001' || $code == '600' || $code == '3352') {
                    $format = "B";
                } else {
                    $format = "";
                }
                if ($SetFont) {
                    foreach ($SetFont['format'] as $key => $f) {
                        if ($f == 'R') {
                            $f = "";
                        }
                        $format = $format . $f;
                    }
                    $this->SetFont($SetFont['font'], $format, $SetFont['fontsize']);
                }
                ////////////////////////////////////////////////////////////////////
                // si hay dia lo multiplico por el valor 
                // sino solo muestro el valor
                $total = ($days) ? $days * $value : $value;

                // Correction de los acentos 
                $utf8_description = pdf_textr($payroll_line['description']);

                $color = ( $i % 2 == 0 ) ? 1 : 0;

                if ($code == '2120' || $code == '2110') {
                    $this->Cell($cell['w'], $cell['h'], $code, 'LR', $cell['ln'], 'C', $color);
                    $this->Cell($cell['w'], $cell['h'], ($days) ? $days : '', 'LR', $cell['ln'], 'C', $color);
                    $this->Cell($cell['w'], $cell['h'], ($days) ? moneda($value) : '', 'LR', $cell['ln'], 'C', $color);
                    $this->Cell($cell['w'], $cell['h'], moneda($total), 'LR', $cell['ln'], $cell['align'], $color);
                    $this->Cell(0, $cell['h'], $utf8_description, 'LR', 1, 'L', $color);
                } else {
                    $this->Cell($cell['w'], $cell['h'], $code, 'LR', $cell['ln'], 'C', $color);
                    $this->Cell($cell['w'], $cell['h'], '', 'LR', $cell['ln'], $cell['align'], $color);
                    $this->Cell($cell['w'], $cell['h'], '', 'LR', $cell['ln'], $cell['align'], $color);
                    $this->Cell($cell['w'], $cell['h'], moneda($total), 'LR', $cell['ln'], $cell['align'], $color);
                    $this->Cell(0, $cell['h'], $utf8_description, 'LR', 1, 'L', $color);
                }
                $i++;

                $format = '';
            }
            $this->Cell(0, $cell['h'], '', 'T', $cell['ln'], $cell['align'], 0);
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////
        }
    }

    function items3($translate = true, $line = null) {
        global $id;

        $payroll_lines = hr_payroll_lines_search_by('payroll_id', $id);

        foreach ($payroll_lines as $key => $payroll_line) {

            $keys = array();
            foreach ($payroll_line as $key => $value) {

                if (!is_int($key)) {
                    array_push($keys, $key);
                }
            }

            //vardump($keys);

            $doc_models_lines = doc_models_lines_search_by_modele_doc($this->getDocModele(), $this->getDoc(), $this->getSection());

            foreach ($doc_models_lines as $key => $line) {

                //vardump($line);

                $params = json_decode($line['params'], true);
                $cell = $params['Cell'];

                foreach ($keys as $key) {
                    if ($cell['label'] == "%items[$key]%") {
                        $this->items_select($cell, $key);
                        //$this->items_ . $key($cell, $payroll_line);
                    }
                }


//                switch ($cell['label']) {
//                    case '%items[id]%':
//                        $this->items_id($cell, $payroll_line);
//                        break;
//                    case '%items_code%':
//                        $this->items_code($cell);
//                        break;
//                    default:
//                        break;
//                }
            }

//            $this->Cell($cell['w'], $cell['h'], $label, $cell['border'], $cell['ln'], $cell['align'], $cell['fill'], $cell['link']); 
            $this->Cell(0, 5, '--', 'LTRB', 1, 'C');
        }
    }

    function items_select($cell, $item) {
        switch ($item) {
            case 'id':
                $this->items_id($cell);
                break;
            case 'payroll_id':
                $this->items_payroll_id($cell);
                break;
            case 'code':
                $this->items_code($cell);
                break;
            case 'days':
                $this->items_days($cell);
                break;
            case 'quantity':
                $this->items_quantity($cell);
                break;
            case 'value':
                $this->items_value($cell);
                break;
            case 'description':
                $this->items_description($cell);
                break;
            case 'order_by':
                $this->items_order_by($cell);
                break;
            case 'status':
                $this->items_status($cell);
                break;

            default:
                break;
        }
    }

    function items_id($cell, $id = 1) {
        $this->Cell($cell['w'], $cell['h'], 'Id *', 1, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
    }

    function items_payroll_id($cell) {
        $this->Cell($cell['w'], $cell['h'], $payroll_id, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
    }

    function items_code($cell, $code = 1) {
        $this->Cell($cell['w'], $cell['h'], 'code *', 1, $cell['ln'], $cell['align'], $cell['fill'], $cell['link']);
    }

    function items_xxxxxxxxxxxxxxxxxxx($translate = true, $line = null) {
        global $id;

        global $u_owner_id;

        $params = json_decode($line['params'], true);
        $cell = $params['Cell'];

        // vardump($line); 
        //vardump($params); 
        ##############################################################
        ##############################################################
        ##############################################################
        $SetFont = $params['SetFont'];

        //vardump($SetFont); 

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


        //vardump($cell); 

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
        $is_separator = false;
        $is_note = false;

        foreach (hr_payroll_lines_search_by('payroll_id', $id) as $key => $ii) {


            $fill = (isset($cell) && $cell['fill']) ? 1 : 0;

            // si es una nueva pagina 
            // ponemos en encaezaro
            // fill el color o no
            $color = ( $i % 2 == 0 ) ? $fill : 0;

            ////////////////////////////////////////////////////////////////////
//            if ($is_separator) {
//                $this->Cell(00, 5, $ii['description'], 1, 0, 'L', $color);
//            } else {
            ////////////////////////////////////////////////////////////////////
//            $border = 1 ; 
            $this->Cell(25, $this->get_Pdf_alto_linea() * 0.7, $ii['code'], $border, 0, 'C', $color);
            $this->Cell(25, $this->get_Pdf_alto_linea() * 0.7, $ii['days'], $border, 0, "C", $color);
            $this->Cell(25, $this->get_Pdf_alto_linea() * 0.7, $ii['quantity'], $border, 0, 'C', $color);

            $this->Cell(25, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['value'] * $ii['quantity']), $border, 0, 'R', $color);

            $this->Cell(0, $this->get_Pdf_alto_linea() * 0.7, pdf_textr($ii['description']), $border, 1, 'L', $color);
//                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, "$discounts_mode " . moneda($ii['totaldiscounts']), $border, 0, 'R', $color);
//                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal']), $border, 0, 'R', $color);
//                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['totaltax']) . " (" . $ii['tax'] . "%) ", $border, 0, 'R', $color);
//                $this->Cell(($this->get_Pdf_ancho() / 100) * 10, $this->get_Pdf_alto_linea() * 0.7, moneda($ii['subtotal'] + $ii['totaltax']), $border, 1, 'R', $color);


            $this->SetY($this->GetY() + 0); // le da un ancho en la base del multicell            
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
            $i++;
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////


    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

        $this->setTag('%payroll_id%', str_pad($this->getPayroll()->getId(), 1, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xid%', str_pad($this->getPayroll()->getId(), 2, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxid%', str_pad($this->getPayroll()->getId(), 3, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxid%', str_pad($this->getPayroll()->getId(), 4, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxid%', str_pad($this->getPayroll()->getId(), 5, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxxid%', str_pad($this->getPayroll()->getId(), 6, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxxxid%', str_pad($this->getPayroll()->getId(), 7, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxxxxid%', str_pad($this->getPayroll()->getId(), 8, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxxxxxid%', str_pad($this->getPayroll()->getId(), 9, "0", STR_PAD_LEFT));
        $this->setTag('%payroll_xxxxxxxxxid%', str_pad($this->getPayroll()->getId(), 10, "0", STR_PAD_LEFT));

        $this->setTag("%payroll_date_entry%", $this->getPayroll()->getDate_entry());

        $address = json_decode($this->getPayroll()->getAddress(), true);

// Verificar si la decodificación fue exitosa y si es un array
        if (is_array($address)) {
            $this->setTag("%payroll_address%", _text(($address["address"] ?? null)));
            $this->setTag('%payroll_address_number%', _text($address["number"] ?? null));
            $this->setTag('%payroll_address_postcode%', _text($address["postcode"] ?? null));
            $this->setTag('%payroll_address_barrio%', _text($address["barrio"] ?? null));
            $this->setTag('%payroll_address_sector%', _text($address["sector"] ?? null));
            $this->setTag('%payroll_address_ref%', _text($address["ref"] ?? null));
            $this->setTag('%payroll_address_city%', _text($address["city"] ?? null));
            $this->setTag('%payroll_address_province%', _text($address["province"] ?? null));
            $this->setTag('%payroll_address_region%', _text($address["region"] ?? null));
            $this->setTag('%payroll_address_country_code%', _text($address["country"] ?? null));

            // Obtener el nombre del país solo si el código del país está presente
            $country_code = $address["country"] ?? null;
            $this->setTag('%payroll_address_country%', _text($country_code ? countries_country_by_country_code($country_code) : null));
        } else {
            // Manejar el caso cuando $address no es un array válido (error en el JSON)
            $this->setTag("%payroll_address%", _text(null));
            $this->setTag('%payroll_address_number%', _text(null));
            $this->setTag('%payroll_address_postcode%', _text(null));
            $this->setTag('%payroll_address_barrio%', _text(null));
            $this->setTag('%payroll_address_sector%', _text(null));
            $this->setTag('%payroll_address_ref%', _text(null));
            $this->setTag('%payroll_address_city%', _text(null));
            $this->setTag('%payroll_address_province%', _text(null));
            $this->setTag('%payroll_address_region%', _text(null));
            $this->setTag('%payroll_address_country_code%', _text(null));
            $this->setTag('%payroll_address_country%', _text(null));
        }

        $this->setTag("%payroll_fonction%", $this->getPayroll()->getFonction());
        $this->setTag("%payroll_salary_base%", moneda($this->getPayroll()->getSalary_base()));
        $this->setTag("%payroll_civil_status%", $this->getPayroll()->getCivil_status());
        $this->setTag("%payroll_tax_system%", $this->getPayroll()->getTax_system());

        $this->setTag("%payroll_date_start%", $this->getPayroll()->getDate_start());
        $this->setTag("%payroll_date_end%", $this->getPayroll()->getDate_end());
        $this->setTag("%payroll_value_round%", $this->getPayroll()->getValue_round());
        $this->setTag("%payroll_to_pay%", $this->getPayroll()->getTo_pay());
        $this->setTag("%payroll_account_number%", $this->getPayroll()->getAccount_number());
        $this->setTag("%payroll_notes%", $this->getPayroll()->getNotes());

        $this->setTag("%payroll_code%", $this->getPayroll()->getCode());
        $this->setTag("%payroll_order_by%", $this->getPayroll()->getOrder_by());
        $this->setTag("%payroll_status_code%", $this->getPayroll()->getStatus());

        $extras = json_decode($this->getPayroll()->getExtras(), true);

        //vardump($extras); 

        $family_dependents = $extras['family_dependents'];

        $tax_charges = array(
            "Children" => array("n" => $family_dependents['Children']['n'], "h" => $family_dependents['Children']['h']),
            "Spouses" => array("n" => $family_dependents['Spouses']['n'], "h" => $family_dependents['Spouses']['h']),
            "OthersP65" => array("n" => $family_dependents['OthersP65']['n'], "h" => $family_dependents['OthersP65']['h']),
            "OthersM65" => array("n" => $family_dependents['OthersM65']['n'], "h" => $family_dependents['OthersM65']['h']),
        );

        //vardump($tax_charges); 

        $this->setTag('%payroll_charge_childs_n%', $tax_charges['Children']['n']);
        $this->setTag('%payroll_charge_childs_h%', $tax_charges['Children']['h']);

        $this->setTag('%payroll_charge_spouses_n%', $tax_charges['Spouses']['n']);
        $this->setTag('%payroll_charge_spouses_h%', $tax_charges['Spouses']['h']);

        $this->setTag('%payroll_charge_others_plus_65_n%', $tax_charges['OthersP65']['n']);
        $this->setTag('%payroll_charge_others_plus_65_h%', $tax_charges['OthersP65']['h']);

        $this->setTag('%payroll_charge_others_minus_65_n%', $tax_charges['OthersM65']['n']);
        $this->setTag('%payroll_charge_others_minus_65_h%', $tax_charges['OthersM65']['h']);

        ////////////////////////////////////////////////////////////////////
        $this->setTag('%payroll_employee_id%', $this->getPayroll()->getEmployee_id());

        $employee = new Employee();
        $employee->setEmployee(1022, $this->getPayroll()->getEmployee_id());

//        vardump($employee);
//        vardump($employee->getCivil_status()['civil_status']);
//        $this->setTag('%employee_id%', $employee->getContact_id());
        $this->setTag('%employee_name%', $employee->getName());
        $this->setTag('%employee_lastname%', $employee->getLastname());
        $this->setTag('%employee_birthdate%', $employee->getBirthdate());
        $this->setTag('%employee_owner_ref%', $employee->getOwner_ref());
// esto debe estar en el payroll, y no desde la tabla empleado
//        $this->setTag('%employee_cargo%', $employee->getCargo());
        //$this->setTag('%employee_category%', $employee->getCategory());

        foreach (directory_names_list() as $key => $mdnl) {
            if ($mdnl['name']) {
                $this->setTag('%employee_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getPayroll()->getEmployee_id(), $mdnl['name']));
            }
        }

        // debe venir de la tabla payroll
        // Nacionalidad principal                    
        $this->setTag('%employee_nationality_principal%', $extras['nationality']);
        ////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        $txt_tr = ($translate) ? pdf_tr($txt, $this->getLang(), 'PDF') : $txt;

        foreach ($this->_tag as $tag => $tmp) {

            $txt_tr = (str_replace(
                            $tag,
                            $tmp ?? '',
                            $txt_tr
            ));
        }

        return pdf_textr($txt_tr);
    }
}
