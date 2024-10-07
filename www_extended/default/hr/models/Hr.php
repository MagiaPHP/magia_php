<?php

trait Hr {

    public $_total_to_pay = 0;
    //
    public $_tag = array();
    public $_tag_list = array(
        '%payroll_salary_base%',
        '%salary_month%',
        '%salary_hour%',
        '%worked_hours%',
        '%worked_days%',
        '%precompte%',
        '%meal_vouchers%',
        '%fine_withdrawal%',
        '%money_advance_cash%',
        '%money_advance_bank%',
        '%driver%',
        '%value_round%',
        '%total_sold%',
        '%pay_to_bank%',
        '%pay_to_cash%',
        '%total_to_pay%'
    );

    function setHr() {

        $this->setTotal_to_pay();

        $this->setTag("%total_to_pay%", $this->getTotal_to_pay());
        //$this->setTag("%total_to_pay%", 456);
    }

    function setTag($t, $val) {

        if (isset($val)) {
            $this->_tag[$t] = $val;
        } else {
            $this->_tag[$t] = null;
        }
    }

    /////////////////////////////////////////////////////////////////////////////
    function setTotal_to_pay($total = null) {

        if ($total == null) {
            // solo toma de la DB
            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'total_to_pay');

            $this->_total_to_pay = $total;
        } else {

            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_to_pay');

            $this->_total_to_pay = $total;
        }
    }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


    function getTag($tag) {
        return $this->_tag[$tag] ?? $tag;
    }

    function getTags_list() {
        return $this->_tag_list;
    }

    function getTotal_to_pay() {
        return $this->_total_to_pay;
    }

////////////////////////////////////////////////////////////////////////////////

    function template($tag) {

//        $this->setTag('+', '+');
//        $this->setTag('-', '-');
//        $this->setTag('*', '*');
//        $this->setTag('/', '/');
//
//        foreach (hr_payroll_items_list() as $key => $value) {
//            $this->setTag('%' . $value['code'] . '%', hr_payroll_lines_value_by_payroll_id_code($this->_id, $value['code']));
//            array_push($this->_tag_list, '%' . $value['code'] . '%');
//        }

        return $this->getTag($tag);
    }

    function calculate_formule($formule) {
//        //https://github.com/madorin/matex
//        include 'includes/matex-master/src/Evaluator.php';
        // separo por espacio 
        // calculo 
        // regreso el res

        $values_array = explode(" ", $formule);

        $vals = '';
        foreach ($values_array as $value) {
            $vals = $vals . $this->template($value);
        }

        $evaluator = new \Matex\Evaluator();
        //$res = $evaluator->execute('1 + 2');
        $res = $evaluator->execute($vals);

        return $res;
    }
}
