<?php

include pdf_template("a");

class PDF_WORKED_DAYS extends A {

    public $_worked_days;

    function setWorked_days($id) {

//        $this->_payroll = new Payroll();
//        $this->_payroll->setHr_payroll($id);
//        $this->setA($this->_payroll->getEmployee_id());
    }

    function getWorked_days() {
        return $this->_worked_days;
    }

    ////////////////////////////////////////////////////////////////////////////
    function Header() {
        parent::Header();
    }

    function body() {

        $this->addElements("body");
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
                ////////////////////////////////////////////////////////////////////
                // si hay dia lo multiplico por el valor 
                // sino solo muestro el valor
                $total = ($days) ? $days * $value : $value;
                $description = $payroll_line['description'];

                $color = ( $i % 2 == 0 ) ? 1 : 0;

                $this->Cell($cell['w'], $cell['h'], $code, 'LR', $cell['ln'], 'C', $color);
                $this->Cell($cell['w'], $cell['h'], ($days) ? $days : '', 'LR', $cell['ln'], 'C', $color);
                $this->Cell($cell['w'], $cell['h'], ($days) ? moneda($value) : '', 'LR', $cell['ln'], 'C', $color);
                $this->Cell($cell['w'], $cell['h'], moneda($total), 'LR', $cell['ln'], $cell['align'], $color);
                $this->Cell(0, $cell['h'], utf8_encode($description), 'LR', 1, 'L', $color);
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

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////


    function template($txt, $translate = true): string {
        parent::template($txt, $translate);

//        $this->setTag('%payroll_id%', str_pad($this->getPayroll()->getId(), 1, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xid%', str_pad($this->getPayroll()->getId(), 2, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxid%', str_pad($this->getPayroll()->getId(), 3, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxid%', str_pad($this->getPayroll()->getId(), 4, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxid%', str_pad($this->getPayroll()->getId(), 5, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxxid%', str_pad($this->getPayroll()->getId(), 6, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxxxid%', str_pad($this->getPayroll()->getId(), 7, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxxxxid%', str_pad($this->getPayroll()->getId(), 8, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxxxxxid%', str_pad($this->getPayroll()->getId(), 9, "0", STR_PAD_LEFT));
//        $this->setTag('%payroll_xxxxxxxxxid%', str_pad($this->getPayroll()->getId(), 10, "0", STR_PAD_LEFT));
        //$this->setTag("%payroll_date_entry%", $this->getPayroll()->getDate_entry());
//        $address = json_decode($this->getPayroll()->getAddress(), true);
//        $this->setTag("%payroll_address%", _text(($address["address"]) ?? null ));
//        $this->setTag('%payroll_address_number%', (($address["number"])));
//        $this->setTag('%payroll_address_postcode%', _text(($address["postcode"]) ?? null ));
//        $this->setTag('%payroll_address_barrio%', _text(($address["barrio"]) ?? null ));
//        $this->setTag('%payroll_address_sector%', _text(($address["sector"]) ?? null ));
//        $this->setTag('%payroll_address_ref%', _text(($address["ref"]) ?? null ));
//        $this->setTag('%payroll_address_city%', _text(($address["city"]) ?? null ));
//        $this->setTag('%payroll_address_province%', _text(($address["province"]) ?? null ));
//        $this->setTag('%payroll_address_region%', _text(($address["region"]) ?? null ));
//        $this->setTag('%payroll_address_country_code%', _text(( ($address["country"]) ) ?? null ));
//        $this->setTag('%payroll_address_country%', _text(( countries_country_by_country_code($address["country"]) ) ?? null ));
//
//        $this->setTag("%payroll_fonction%", $this->getPayroll()->getFonction());
//        $this->setTag("%payroll_salary_base%", moneda($this->getPayroll()->getSalary_base()));
//        $this->setTag("%payroll_civil_status%", $this->getPayroll()->getCivil_status());
//        $this->setTag("%payroll_tax_system%", $this->getPayroll()->getTax_system());
//
//        $this->setTag("%payroll_date_start%", $this->getPayroll()->getDate_start());
//        $this->setTag("%payroll_date_end%", $this->getPayroll()->getDate_end());
//        $this->setTag("%payroll_value_round%", $this->getPayroll()->getValue_round());
//        $this->setTag("%payroll_to_pay%", $this->getPayroll()->getTo_pay());
//        $this->setTag("%payroll_account_number%", $this->getPayroll()->getAccount_number());
//        $this->setTag("%payroll_notes%", $this->getPayroll()->getNotes());
//
//        $this->setTag("%payroll_code%", $this->getPayroll()->getCode());
//        $this->setTag("%payroll_order_by%", $this->getPayroll()->getOrder_by());
//        $this->setTag("%payroll_status_code%", $this->getPayroll()->getStatus());
        ////////////////////////////////////////////////////////////////////
//        $this->setTag('%payroll_employee_id%', $this->getPayroll()->getEmployee_id());
//        $employee = new Employee();
//        $employee->setEmployee(1022, $this->getPayroll()->getEmployee_id());
//        vardump($employee);
//        vardump($employee->getCivil_status()['civil_status']);
//        $this->setTag('%employee_id%', $employee->getContact_id());
//        $this->setTag('%employee_name%', $employee->getName());
//        $this->setTag('%employee_lastname%', $employee->getLastname());
//        $this->setTag('%employee_birthdate%', $employee->getBirthdate());
//        $this->setTag('%employee_owner_ref%', $employee->getOwner_ref());
// esto debe estar en el payroll, y no desde la tabla empleado
//        $this->setTag('%employee_cargo%', $employee->getCargo());
        //$this->setTag('%employee_category%', $employee->getCategory());
//        foreach (directory_names_list() as $key => $mdnl) {
//            if ($mdnl['name']) {
//                $this->setTag('%employee_' . strtolower($mdnl['name']) . '%', directory_by_contact_name($this->getPayroll()->getEmployee_id(), $mdnl['name']));
//            }
//        }
        // debe venir de la tabla payroll
        // Nacionalidad principal                    
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
